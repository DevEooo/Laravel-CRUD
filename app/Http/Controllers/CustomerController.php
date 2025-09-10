<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = \App\Models\Customer::all();
        return view('customer.index', ['title' => 'List of Customer', 'customer' => $customer]);
    }

    public function create()
    {
        return view('customer/create', ['title' => 'Add Customer']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Customer::create(
            [
                'name' => $request->name,
                'phone_num' => $request->phone_num,
                'address' => $request->address
            ]
        );
        return redirect('/customer/create')->with('success', 'Product created successfully!');
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
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect('/customer')->with('error', 'Update failed');
        }

        return view('customer.edit', ['title' => 'Edit Customer data', 'customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect('/customer/index')->with('error', 'Customer data was not not found!');
        }
        $data = $request->only(['name', 'phone_num', 'address']);
        
        $customer->update($data);
        return redirect('/customer/index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $customer = Customer::find($request->id);
        if ($customer) {
            $customer->delete();
            return redirect('/customer/index')->with('Success', 'Customer data was deleted successfully');
        }
        return redirect('/customer/index')->with('error', 'Customer Data not found');
    }
}
