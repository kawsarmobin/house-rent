<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\HouseInfo;
use App\Models\HouseType;
use App\Models\HouseImage;
use App\Models\HouseDetails;
use App\Http\Controllers\Controller;
use App\Traits\MultipleImageUploadTraits;
use App\Http\Requests\CreateHouseInfoRequest;
use App\Http\Requests\UpdateHouseInfoRequest;

class HouseInfosController extends Controller
{
    use MultipleImageUploadTraits;

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
     * @param  \Illuminate\Http\CreateHouseInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHouseInfoRequest $request)
    {
        $request['user_id'] = $request->landlord;
        $request['house_type_id'] = $request->house_type;
        $request['house_token'] = str_random(60);

        $houseInfo = HouseInfo::create($request->all());

        $houseInfo->houseDetails()->create($request->all());

        /* Multiple image upload */
        $data = $this->imagesUpload($houseInfo);
        HouseImage::insert($data);
        
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
        return view('admin.house_infos.show')
            ->with('houseInfo', $houseInfo);
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
     * @param  \Illuminate\Http\UpdateHouseInfoRequest  $request
     * @param  \App\Models\HouseInfo  $houseInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHouseInfoRequest $request, HouseInfo $houseInfo)
    {
        $request['user_id'] = $request->landlord;
        $request['house_type_id'] = $request->house_type;
        $request['house_token'] = str_random(60);

        $houseInfo->update($request->all());

        $house_details = HouseDetails::where('house_id', $houseInfo->id)->first();
        $house_details->update($request->all());

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
        $house_images = $houseInfo->houseImages;

        if ($houseInfo->delete()) {
            foreach ($house_images as $image) {
                unlink(public_path(HouseImage::UPLOAD_PATH.'/'.$image->image));
                unlink(public_path(HouseImage::THUMB_UPLOAD_PATH.'/'.$image->image));
            }
        }
        return back();
    }

    public function approval(HouseInfo $house_info)
    {
        $house_info->approved = !$house_info->approved;
        $house_info->save();
        return back();
    }
}
