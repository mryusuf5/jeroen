<?php

namespace App\Http\Controllers;

use App\Models\leaderboards;
use App\Models\Workouts;
use Illuminate\Http\Request;

class LeaderboardsController extends Controller
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
        $request->validate([
           'customer_id' => 'required'
        ]);

        $workout = Workouts::find($request->workout_id);
//        dd(mb_substr((int)$request->minutes * 1000 + (int)$request->seconds, -3));

        $leaderboard = new leaderboards();
        $leaderboard->customer_id = $request->customer_id;
        if($workout->type == 0)
        {
            $seconds = $request->minutes * 60 + $request->seconds;
            $leaderboard->seconds = $seconds;
            $leaderboard->time = gmdate('i:s', $seconds);
        }
        else if($workout->type == 1)
        {
//            $length = (int)$request->minutes * 1000 + (int)$request->seconds;
//            $leaderboard->seconds = (int)$request->minutes * 1000 + (int)$request->seconds;
//            $fullLength = strlen((int)$request->minutes * 1000 + (int)$request->seconds);
//
//            $meters = mb_substr((int)$request->minutes * 1000 + (int)$request->seconds, -3);
//            $length_string = (string)$length;
//            $kilometers = substr($length_string, 0, $fullLength - 3);
//
//            $leaderboard->time = $kilometers . ',' . $meters;

            $leaderboard->seconds = $request->seconds;
            $leaderboard->time = $request->seconds;
        }
        else if ($workout->type == 2)
        {
            $leaderboard->seconds = $request->seconds;
            $leaderboard->time = $request->seconds;
        }

        $leaderboard->remark = $request->remark;
        $leaderboard->workout_id = $request->workout_id;
        if($request->anonymous === 'on')
        {
            $leaderboard->anonymous = 1;
        }

        $leaderboard->save();

        return redirect()->route('singleWorkout', $request->workout_id)->with('success', 'Deelnemer toegevoegd');
    }

    /**
     * Display the specified resource.
     */
    public function show(leaderboards $leaderboards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(leaderboards $leaderboards)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, leaderboards $leaderboards)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        leaderboards::destroy($id);

        return redirect()->back()->with('success', 'Deelnemer verwijderd');
    }
}
