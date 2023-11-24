<?php

namespace App\Http\Controllers;

use App\Models\diplomas;
use App\Models\SliderImages;
use Illuminate\Http\Request;

class DiplomasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = diplomas::all();
        return view("admin.diplomas.index", compact("images"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.diplomas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $filename = str_replace(' ', '_', $file->getClientOriginalName());

        $file->move('images/diplomas/', $filename);

        $diploma = new diplomas();
        $diploma->image_path = $filename;
        $diploma->save();

        return redirect()->route('admin.diplomas.index')->with('success', 'Afbeelding opgeslagen.');
    }

    /**
     * Display the specified resource.
     */
    public function show(diplomas $diplomas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(diplomas $diplomas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, diplomas $diplomas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        diplomas::destroy($id);

        return redirect()->route("admin.diplomas.index")->with("success", "Afbeelding verwijderd");
    }
}
