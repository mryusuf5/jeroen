<?php

namespace App\Http\Controllers;

use App\Models\ChartData;
use App\Models\Charts;
use App\Models\Customers;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $charts = Charts::all();

        foreach($charts as $index => $chart)
        {
            $chart_data = ChartData::where('chart_id', $chart['id'])
                ->limit(3)
                ->orderBy('created_at', 'DESC')
                ->get();
            $charts[$index]['chart_data'] = $chart_data;
        }

        return view('admin.charts.index', compact('charts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customers::all();

        return view('admin.charts.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'weight' => 'required',
            'fat_percentage' => 'required'
        ]);

        $customer = Customers::where('id', $request->customer_id)->first();

        $chart = new Charts();

        $chart->firstname = $customer->firstname;
        $chart->lastname = $customer->lastname;

        $chart->save();

        $weight = str_replace(',', '.', $request->weight);
        $fat_percentage = str_replace(',', '.', $request->fat_percentage);

        $chart_data = new ChartData();

        if($request->date)
        {
            $chart_data->created_at = $request->date;
        }

        $chart_data->chart_id = $chart->id;
        $chart_data->customer_id = $request->customer_id;
        $chart_data->weight = $weight;
        $chart_data->fat_percentage = $fat_percentage;

        $chart_data->save();

        return redirect()->route('admin.charts.index', ['chartType' => 'bars'])->with('success', 'Grafiek opgesteld');
    }

    /**
     * Display the specified resource.
     */
    public function show(Charts $charts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $chart = Charts::where('id', $id)->first();

        $chart['chart_data'] = ChartData::where('chart_id', $id)
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('admin.charts.edit', compact('chart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'required',
            'fat_percentage' => 'required'
        ]);

        $chart = Charts::where('id', $id)->first();

        $weight = str_replace(',', '.', $request->weight);
        $fat_percentage = str_replace(',', '.', $request->fat_percentage);

        $chart_data = new ChartData();

        if($request->date)
        {
            $chart_data->created_at = $request->date;
        }

        $chart_data->chart_id = $chart->id;
        $chart_data->customer_id = $request->customer_id;
        $chart_data->weight = $weight;
        $chart_data->fat_percentage = $fat_percentage;
        $chart_data->save();

        return redirect()->route('admin.charts.edit', $id)->with('success', 'Grafiek aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Charts::destroy($id);
        $chart_data = ChartData::where('chart_id', $id);
        $chart_data->delete();

        return redirect()->route('admin.charts.index', ['chartType' => 'bars'])->with('success', 'Grafiek verwijderd');
    }
}
