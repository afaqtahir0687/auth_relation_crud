<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Parents;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Redirect;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = Parents::orderBy('created_at', 'DESC')->get();
        return view('parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parents.create');
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

        $parents = new Parents();
        $parents->name = $request->name;
        $parents->email = $request->email;
        $parents->phone_number = $request->phone;
        $parents->save();
        return Redirect::to('parents')->with(['success' => 'Your Parent Added Suucessfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parents = Parents::where('id', $id)->first();
        return view('parents.show', compact('parents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parents = Parents::where('id', $id)->first();
        return view('parents.edit', compact('parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $parents = Parents::find($id);
        $parents->name = $request->name;
        $parents->email = $request->email;
        $parents->phone_number = $request->phone;
        $parents->save();
        return Redirect::to('parents')->with(['success' => 'Your Parent Update Suucessfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parents = Parents::find($id);
        $parents->delete();
        return Redirect::to('parents')->with(['success' => 'Your Parent Delete Suucessfully']);

    }
}
