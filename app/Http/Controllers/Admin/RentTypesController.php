<?php

namespace App\Http\Controllers\Admin;

use App\Models\RentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rent_types.index')
            ->with('rentTypes', RentType::orderBy('name')->get());
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
            'name' => 'required|min:2'
        ]);

        RentType::create($request->all());

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RentType  $rentType
     * @return \Illuminate\Http\Response
     */
    public function edit(RentType $rentType)
    {
        return view('admin.rent_types.edit')
            ->with('rentType', $rentType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RentType  $rentType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentType $rentType)
    {
        $this->validate($request, [
            'name' => 'required|min:2'
        ]);

        $rentType->update($request->all());

        return redirect()->route('admin.rent-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RentType  $rentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentType $rentType)
    {
        $rentType->delete();
        return back();
    }
}
