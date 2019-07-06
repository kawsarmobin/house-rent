<?php

namespace App\Http\Controllers\Admin;

use App\Models\HouseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HouseTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.house_types.index')
                ->with('houseTypes', HouseType::orderBy('name')->get());
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

        HouseType::create($request->all());

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseType $houseType)
    {
        return view('admin.house_types.edit')
                ->with('houseType', $houseType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseType $houseType)
    {
        $this->validate($request, [
            'name' => 'required|min:2'
        ]);

        $houseType->update($request->all());

        return redirect()->route('admin.house-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseType  $houseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseType $houseType)
    {
        $houseType->delete();
        return back();
    }
}
