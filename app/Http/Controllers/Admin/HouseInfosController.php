<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Landlord;
use App\Models\HouseInfo;
use App\Models\HouseType;
use App\Models\HouseImage;
use App\Models\HouseDetails;
use App\Models\Location\City;
use App\Models\Location\Word;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\Division;
use App\Http\Controllers\Controller;
use App\Models\Location\PoliceStation;
use App\Traits\MultipleImageUploadTraits;
use App\Http\Requests\CreateHouseInfoRequest;
use App\Http\Requests\UpdateHouseInfoRequest;
use App\Models\HouseLocation;

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
            // fetch location data to all location model
            ->with('countries', Country::orderBy('country')->get())
            ->with('divisions', Division::orderBy('division')->get())
            ->with('cities', City::orderBy('city')->get())
            ->with('police_stations', PoliceStation::orderBy('police_station')->get())
            ->with('villages', Village::orderBy('village')->get())
            ->with('words', Word::orderBy('word')->get())
            // fetch landlords to user const (*I will used landlord scope*)
            ->with('landlords', Landlord::all())
            // fetch house type data from database within HouseType model
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

        /** 
         * Multiple image upload
         * using traits (follow MultipleImageUploadTraits) 
         */
        $data = $this->imagesUpload($houseInfo);
        HouseImage::insert($data);

        // insert all locatin data
        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;
        $request['city_id'] = $request->city;
        $request['police_station_id'] = $request->police_station;
        $request['village_id'] = $request->village;
        $request['word_id'] = $request->word;
        $houseInfo->houseLocation()->create($request->all());

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
            // fetch location data to all location model
            ->with('countries', Country::orderBy('country')->get())
            ->with('divisions', Division::orderBy('division')->get())
            ->with('cities', City::orderBy('city')->get())
            ->with('police_stations', PoliceStation::orderBy('police_station')->get())
            ->with('villages', Village::orderBy('village')->get())
            ->with('words', Word::orderBy('word')->get())
            // fetch landlords to user const (*I will used landlord scope*)
            ->with('landlords', Landlord::all())
            // fetch house type data from database within HouseType model
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

        // house details update
        $house_details = HouseDetails::where('house_id', $houseInfo->id)->first();
        $house_details->update($request->all());

        // insert all locatin data
        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;
        $request['city_id'] = $request->city;
        $request['police_station_id'] = $request->police_station;
        $request['village_id'] = $request->village;
        $request['word_id'] = $request->word;

        // house location update
        $house_location = HouseLocation::findOrFail($houseInfo->houseLocation->id);
        $house_location->update($request->all());

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
                unlink(public_path(HouseImage::UPLOAD_PATH . '/' . $image->image));
                unlink(public_path(HouseImage::THUMB_UPLOAD_PATH . '/' . $image->image));
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
