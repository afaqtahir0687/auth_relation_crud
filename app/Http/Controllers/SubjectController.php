<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::with(['classes'])->orderBy('created_at', 'DESC')->get();
        return view('subject.index', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = Classes::all();
        return view('subject.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'description' => 'required',
        ]);

        $subject = new Subject();
        $subject->class_id = $request->class_id;
        $subject->description = $request->description;
        $subject->save();
        return Redirect::to('subject')->with(['success' => 'Your Subject Added Suucessfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::where('id', $id)->first();
        return view('subject.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::where('id', $id)->first();
        return view('subject.edit',compact('subject'));
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

        $subject =  Subject::find($id);
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->save();
        return Redirect::to('subject')->with(['success' => 'Your Subject Update Suucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject =  Subject::find($id);
        $subject->delete();
        return Redirect::to('subject')->with(['success' => 'Your Subject Update Suucessfully']);
    }
}
