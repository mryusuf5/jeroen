<?php

namespace App\Http\Controllers;

use App\Models\SliderImages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SliderController extends Controller
{

    public function welcome()
    {
        $images = SliderImages::all();
        return view('user.welcome', compact('images'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $images = SliderImages::all();
        return view('admin.carousel.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $filename = str_replace(' ', '_', $file->getClientOriginalName());
        $filenameWithoutExt = explode('.', $filename)[0];

        $file->move('images/carousel/', $filename);

        $carousel = new SliderImages();
        $carousel->image_name = $filenameWithoutExt;
        $carousel->image_path = $filename;
        $carousel->save();

        return redirect()->route('admin.carousel.index')->with('success', 'Afbeelding opgeslagen.');
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
    public function destroy(string $id): RedirectResponse
    {
        SliderImages::where('id', $id)->delete();

        return redirect()->route('admin.carousel.index')->with('success', 'Afbeelding verwijderd');
    }
}
