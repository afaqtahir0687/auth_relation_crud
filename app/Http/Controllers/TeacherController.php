<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::orderBy('created_at', 'DESC')->get();
        return view('teachers.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required', 
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->save();
        return Redirect::to('teachers')->with(['success' => 'Your Teacher Added Successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::where('id', $id)->first();
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::where('id', $id)->first();
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => ['required', new \App\Rules\PakistaniPhoneNumber],
        ]);
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->save();
        return Redirect::to('teachers')->with(['success' => 'Your Teacher Updated Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return Redirect::to('teachers')->with(['success' => 'Your Teacher Delete Successfully']);

    }
}
