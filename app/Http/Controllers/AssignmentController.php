<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Assign;
use Illuminate\Support\Facades\Redirect;


class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignments = Assignment::with(['courses'])->orderBy('created_at', 'DESC')->get();
        return view('assignments/index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('assignments.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required',
        ]);

        $assignments = new Assignment();
        $assignments->course_id = $request->course_id;
        $assignments->title = $request->title;
        $assignments->due_date = $request->due_date;
        $assignments->save();
        return Redirect::to('assignments')->with(['success' => 'Your Assignment Added Successfully']);
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
        $courses = Course::all();
        $assignments = Assignment::where('id', $id)->first();
        return view('assignments.edit', compact('assignments', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required',
        ]);

        $assignments = Assignment::find($id);
        $assignments->course_id = $request->course_id;
        $assignments->title = $request->title;
        $assignments->due_date = $request->due_date;
        $assignments->save();
        return Redirect::to('assignments')->with(['success' => 'Your Assignment Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assignments = Assignment::find($id);
        $assignments->delete();
        return Redirect::to('assignments')->with(['success' => 'Your Assignment Delete Successfully']);
    }
}
