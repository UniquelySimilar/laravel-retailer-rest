<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    protected $validationRules = [
        // TODO: Implement other more specific rules where necessary
        'customerName' => 'required',
        'contactLastName' => 'required',
        'contactFirstName' => 'required',
        'phone' => 'required',
        'addressLine1' => 'required',
        //'addressLine2',
        'city' => 'required',
        'state' => 'required',
        'postalCode' => 'required',
        //'country',
        //'salesRepEmployeeNumber',
        //'creditLimit'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            return \Response::json([
                'validationErrors' => $validator->errors()
            ], 400);
        }

        $customer = Customer::create($request->all());

        return response($customer->toJson(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return $customer->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // NOTE: If customer with ID not found, app automatically returns response with status code 404
        $validator = \Validator::make($request->all(), $this->validationRules);

        if ($validator->fails()) {
            return \Response::json([
                'validationErrors' => $validator->errors()
            ], 400);
        }

        $customer->update($request->all());

        return response('', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response('', 204);
    }
}
