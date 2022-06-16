<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        // Using Scope In Database Model
        // $activeCustomers = Customer::active()->get();
        // $inactiveCustomers = Customer::inactive()->get();

        // Two different queries
        // $activeCustomers = Customer::where('status' , 1)->get();
        // $inactiveCustomers = Customer::where('status' , 0)->get();

        // Fetching all the Customer
         $customers = Customer::all();

        // Passing data in Array from
        /* return view('internals.customers', [
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers,
        ]); /**/

        // passing data in compact (Shorthand Notation)
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        // Validation
        /* $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',
        ]); /**/

        // Saving to Database In One Line
        // Customer::create($data);
        Customer::create($this->validateRequest());

        // Saving to Database
        /* $customer = new Customer();
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->status = request('status');
        $customer->save(); /**/

        // return back();
        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        // $customer = Customer::find($customer);
        // $customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer)
    {
        // Validation
        /* $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required',
        ]); /**/

        // Saving to Database In One Line
        // $customer->update($data);
        $customer->update($this->validateRequest());

        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    public function validateRequest()
    {
        // Validation
        return request()->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
                'status' => 'required',
                'company_id' => 'required',
            ]);
    }

}
