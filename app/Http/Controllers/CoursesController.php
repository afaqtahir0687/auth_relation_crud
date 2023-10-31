<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'DESC')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $courses = new Course();
        $courses->name = $request->name;
        $courses->description = $request->description;
        $courses->save();
        return Redirect::to('courses')->with(['success' => 'Your Course Added Successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses = Course::where('id', $id)->first();
        return view('courses.show', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = Course::where('id', $id)->first();
        return view('courses.edit', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $courses = Course::find($id);
        $courses->name = $request->name;
        $courses->description = $request->description;
        $courses->save();
        return Redirect::to('courses')->with(['success' => 'Your Course Update Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courses = Course::find($id);
        $courses->delete();
        return Redirect::to('courses')->with(['success' => 'Your Course Delete Successfully']);
    }
}
