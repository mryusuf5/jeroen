<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\leaderboards;
use App\Models\Workouts;
use Illuminate\Http\Request;

class WorkoutsController extends Controller
{
    public function welcome()
    {
        $workouts = Workouts::all();
        return view('user.wirkenWorkouts', compact('workouts'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workouts = Workouts::all();
        return view('admin.workouts.index', compact('workouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.workouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        $file = $request->file('image');
        $filename = str_replace(' ', '_', $file->getClientOriginalName());
        $file->move('images/workouts/', $filename);

        $workout = new Workouts();
        $workout->title = $request->title;
        $workout->body = $request->workout;
        $workout->image_path = $filename;
        $workout->description = $request->description;
        $workout->type = $request->type;

        $workout->save();

        return redirect()->route('admin.workouts.index')->with('success', 'Workout aangemaakt');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workout = Workouts::where('id', $id)->first();
        $customers = Customers::all();
        if($workout->type == 0)
        {
            $leaderboards = leaderboards::where('workout_id',  $id)->join('customers', 'customers.id', '=', 'leaderboards.customer_id')
                ->select('leaderboards.*', 'customers.firstname', 'customers.lastname', 'customers.image_path')
                ->orderby('leaderboards.time', 'ASC')
                ->get();
        }
        else if($workout->type == 1)
        {
            $leaderboards = leaderboards::where('workout_id',  $id)->join('customers', 'customers.id', '=', 'leaderboards.customer_id')
                ->select('leaderboards.*', 'customers.firstname', 'customers.lastname', 'customers.image_path')
                ->orderby('leaderboards.time', 'ASC')
                ->get();
        }


        return view('user.wirkenWorkout', compact('workout', 'customers', 'leaderboards'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workout = Workouts::where('id', $id)->first();

        return view('admin.workouts.edit', compact('workout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required'
        ]);

        $workout = Workouts::find($id);

        if($file = $request->file('image'))
        {
            $filename = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move('images/workouts/', $filename);
            $workout->image_path = $filename;
        }

        $workout->title = $request->title;
        $workout->body = $request->workout;
        $workout->description = $request->description;
        $workout->type = $request->type;

        $workout->update();

        return redirect()->route('admin.workouts.index')->with('success', 'Workout aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Workouts::where('id', $id)->delete();

        return redirect()->route('admin.workouts.index')->with('success', 'Workout verwijderd');
    }
}
