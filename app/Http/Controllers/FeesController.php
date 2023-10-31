<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fees::with(['student'])->orderBy('created_at', 'DESC')->get();
        return view('fees/index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
        return view('fees.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'student_id' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
        ]);

        $fees = new Fees();
        $fees->student_id = $request->student_id;
        $fees->amount = $request->amount;
        $fees->due_date = $request->due_date;
        $fees->save();
        return Redirect::to('fees')->with(['success' => 'Your Fees Added Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::all();
        $fees = Fees::where('id', $id)->first();
        return view('fees.show', compact('fees', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::all();
        $fees = Fees::where('id', $id)->first();
        return view('fees.edit', compact('fees', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'student_id' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
        ]);

        $fees = Fees::find($id);
        $fees->student_id = $request->student_id;
        $fees->amount = $request->amount;
        $fees->due_date = $request->due_date;
        $fees->save();
        return Redirect::to('fees')->with(['success' => 'Your Fees Update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fees = Fees::find($id);
        $fees->delete();
        return Redirect::to('fees')->with(['success' => 'Your Fees Delete Successfully']);
    }
}
