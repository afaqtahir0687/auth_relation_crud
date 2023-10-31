<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Student;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::orderBy('created_at', 'DESC')->get();
        return view('attendance.index', compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
       return view('attendance.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required',
            'status' => 'required|in:present,absent',
        ]);

        $attendance = new Attendance();
        $attendance->status = $request->status;
        $attendance->date = Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-F-d');
        $student = Student::findOrFail($request->student_id);
        $student->attendances()->save($attendance);
        return Redirect::to('attendance')->with(['success' => 'Your Attendance Added Successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::all();
        $attendance = Attendance::where('id', $id)->first();
        return view('attendance.edit', compact('attendance', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'required',
            'date' => 'required',
            'status' => 'required|in:present,absent',
        ]);

        $attendance = Attendance::find($id);
        $attendance->status = $request->status;
        $attendance->date = Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-F-d');
        $student = Student::findOrFail($request->student_id);
        $student->attendances()->save($attendance);
        return Redirect::to('attendance')->with(['success' => 'Your Attendance Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return Redirect::to('attendance')->with(['success' => 'Your Attendance Delete Successfully']);

    }
}
