<?php

namespace App\Http\Controllers\Admin;

use App\Models\CustomerType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CustomerTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer_types.index')
            ->with('customer_types', CustomerType::orderBy('type')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        CustomerType::create($request->all());
        Session::flash('success', 'Customer type create successfully');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerType  $customerType
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerType $customerType)
    {
        return view('admin.customer_types.edit')
            ->with('customer_type', $customerType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerType  $customerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerType $customerType)
    {
        $this->validate($request, [
            'type' => 'required',
        ]);

        $customerType->update($request->all());
        Session::flash('success', 'Customer type update successfully');
        return redirect()->route('admin.customer-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerType  $customerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerType $customerType)
    {
        if ($customerType->delete()) {
            Session::flash('success', 'Customer type delete successfully');
        }
        return back();
    }
}
