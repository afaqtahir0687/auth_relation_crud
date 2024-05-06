<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::orderBy('created_at', 'DESC')->get();
        // $student = Student::withoutTrashed()->orderBy('created_at', 'DESC')->get();
        
        // $student->transform(function ($student) {
        //     $student->dob = Carbon::parse($student->dob)->format('Y-M-d');
        //     return $student;
        // });
        return view('students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'registration_number' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'fee' => 'required',
            'language' => 'required',
            'status' => 'required',
        ]);
        $student = new Student();
        $student->name = $request->name;
        $student->registration_number = $request->registration_number;
        $student->dob = $request->dob;
        $student->gender = $request->gender;
        $student->fee = $request->fee;
        $student->language = $request->language;
        $student->status = $request->status;
        $student->save();
        return Redirect::to('/')->with(['success' => 'Your Student Added Suucessfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::where('id', $id)->first();
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $student = Student::where('id', $id)->first();
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    
        $request->validate([
            'name' => 'required',
            'registration_number' => 'required',
            'dob' => 'required',
        ]);

        $student =Student::find($id);
        $student->name = $request->name;
        $student->registration_number = $request->registration_number;
        $student->dob = $request->dob;
        $student->save();
        return Redirect::to('/')->with(['success' => 'Your Student Updated Suucessfully']);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student =Student::find($id);
        $student->delete();
        return Redirect::to('/')->with(['success' => 'Your Student Delete Suucessfully']);
    }
}
