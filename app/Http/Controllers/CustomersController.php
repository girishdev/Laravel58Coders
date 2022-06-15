<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list ()
    {
        // Using Scope In Database Model
        $activeCustomers = Customer::active()->get();
        $inactiveCustomers = Customer::inactive()->get();

        // Two different queries
        // $activeCustomers = Customer::where('status' , 1)->get();
        // $inactiveCustomers = Customer::where('status' , 0)->get();

        // Fetching all the Customer
        // $customers = Customer::all();

        // Passing data in Array from
        /* return view('internals.customers', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
        ]); /**/

        // passing data in compact (Shorthand Notation)
        return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));
    }

    public function store()
    {
        // Validation
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required'
        ]);

        // Saving to Database In One Line
        Customer::create($data);

        // Saving to Database
        /* $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->status = request('status');
        $customer->save(); /**/

        return back();
    }

}
