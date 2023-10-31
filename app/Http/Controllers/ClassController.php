<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // dd(request()->all());
        $class = Classes::orderBy('created_at', 'DESC')->get();
        return view('classes.index', compact('class'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'subject' => 'required',
        ]);

        $class = new Classes();
        $class->name = $request->name;
        $class->description = $request->description;
        $class->subjects = $request->subject;
        $class->save();
        return Redirect::to('classes')->with(['success' => 'Your Class Added Successfully']);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
        $class = Classes::where('id', $id)->first();
        return view('classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Classes::where('id', $id)->first();
        return view('classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'subject' => 'required',
        ]);

        $class = Classes::find($id);
        $class->name = $request->name;
        $class->description = $request->description;
        $class->subjects = $request->subject;
        $class->save();
        return Redirect::to('classes')->with(['success' => 'Your Class Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Classes::find($id);
        $class->delete();
        return Redirect::to('classes')->with(['success' => 'Your Class Delete Successfully']);

    }
}
