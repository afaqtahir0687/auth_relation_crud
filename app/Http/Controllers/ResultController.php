<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::with(['student'])->orderBy('created_at', 'DESC')->get();
        return view('results.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all();
        return view('results.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'student_id' => 'required',
            'obtained_marks' => 'required',
            'total_marks' => 'required|in:100',
        ]);

        $results = new Result();
        $results->student_id = $request->student_id;
        $results->marks_obtained = $request->obtained_marks;
        $results->total_marks = $request->total_marks;
        $results->save();
        return Redirect::to('results')->with(['success' => 'Your Result Added Suucessfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $results = Result::where('id', $id)->first();
        $student = Student::all(); // Define the $student variable here
        return view('results.show', compact('results', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $results = Result::where('id', $id)->first();
        $student = Student::all(); 
        return view('results.edit', compact('results', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'student_id' => 'required',
            'obtained_marks' => 'required',
            'total_marks' => 'required|in:100',
        ]);

        $results = Result::find($id);
        $results->student_id = $request->student_id;
        $results->marks_obtained = $request->obtained_marks;
        $results->total_marks = $request->total_marks;
        $results->save();
        return Redirect::to('results')->with(['success' => 'Your Result Update Suucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $results = Result::find($id);
        $results->delete();
        return Redirect::to('results')->with(['success' => 'Your Result Delete Suucessfully']);
    }
}
