<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::with(['classes', 'subject'])->orderBy('created_at', 'DESC')->get();
        return view('exams/index', compact('exams'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = Classes::all();
        $subject = Subject::all();
        return view('exams.create', compact('class', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required',
            'date' => 'required',
            'title' => 'required',
        ]);
    
        $exam = new Exam();
        $exam->class_id = $request->class_id;
        $exam->subject_id = $request->subject_id;
        $exam->exam_date = $request->date;
        $exam->title = $request->title;
        $exam->save();
    
        return Redirect::to('exams')->with(['success' => 'Your Exams Added Suucessfully']);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
