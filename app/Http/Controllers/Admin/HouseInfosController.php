<?php

namespace App\Http\Controllers\Admin;

use App\Models\HouseInfo;
use App\Models\HouseType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class HouseInfosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.house_infos.index')
            ->with('houseInfos', HouseInfo::orderBy('title')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.house_infos.create')
            ->with('landlords', User::where('user_role', 2)->get())
            ->with('housetypes', HouseType::orderBy('name')->get());
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
            'landlord' => 'required',
            'house_type' => 'required',
            'title' => 'required',
            'house_address' => 'required',
        ]);

        $request['user_id'] = $request->landlord;
        $request['house_type_id'] = $request->house_type;
        $request['house_token'] = str_random(60);

        HouseInfo::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseInfo  $houseInfo
     * @return \Illuminate\Http\Response
     */
    public function show(HouseInfo $houseInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseInfo  $houseInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseInfo $houseInfo)
    {
        return view('admin.house_infos.edit')
            ->with('landlords', User::where('user_role', 2)->get())
            ->with('housetypes', HouseType::orderBy('name')->get())
            ->with('houseInfo', $houseInfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseInfo  $houseInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseInfo $houseInfo)
    {
        $this->validate($request, [
            'landlord' => 'required',
            'house_type' => 'required',
            'title' => 'required',
            'house_address' => 'required',
        ]);

        $request['user_id'] = $request->landlord;
        $request['house_type_id'] = $request->house_type;
        $request['house_token'] = str_random(60);

        $houseInfo->update($request->all());

        return redirect()->route('admin.house-info.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseInfo  $houseInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseInfo $houseInfo)
    {
        $houseInfo->delete();
        return back();
    }

    public function approval(HouseInfo $house_info)
    {
        $house_info->approved = !$house_info->approved;
        $house_info->save();
        return back();
    }
}
