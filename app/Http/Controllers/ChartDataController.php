<?php

namespace App\Http\Controllers;

use App\Models\ChartData;
use Illuminate\Http\Request;

class ChartDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ChartData $chartData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChartData $chartData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChartData $chartData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ChartData::destroy($id);

        return redirect()->back()->with('success', 'Data verwijderd');
    }
}
