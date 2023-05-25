<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::sortable()->get();

        return view('admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required'
        ]);



        $customer = new Customers();

        $customer->firstname = ucfirst($request->firstname);
        $customer->lastname = ucfirst($request->lastname);
        $customer->lastname = ucfirst($request->lastname);
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;

        if($file = $request->file('image'))
        {
            $filename = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move('images/customers/', $filename);
            $customer->image_path = $filename;
        }

        $customer->save();

        return redirect()->route('admin.customers.index')->with('success', 'Klant toegevoegd');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customers::where('id', $id)->first();

        return view('admin.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $customer = Customers::where('id', $id)->first();

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;

        if($file = $request->file('image'))
        {
            $filename = str_replace(' ', '_', $file->getClientOriginalName());
            $file->move('images/customers/', $filename);
            $customer->image_path = $filename;
        }

        $customer->save();

        return redirect()->route('admin.customers.index')->with('success', 'Klant aangepast');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Customers::destroy($id);

        return redirect()->route('admin.customers.index')->with('success', 'Klant verwijderd');
    }
}
