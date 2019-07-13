<?php

namespace App\Http\Controllers\Admin\Location;

use Session;
use Illuminate\Http\Request;
use App\Models\Location\City;
use Illuminate\Support\Carbon;
use App\Models\Location\Country;
use App\Models\Location\Village;
use App\Models\Location\Division;
use App\Http\Controllers\Controller;
use App\Models\Location\PoliceStation;

class VillagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::orderBy('country')->get();
        $division = Division::orderBy('division')->get();
        $city = City::orderBy('city')->get();
        $police_station = PoliceStation::orderBy('police_station')->get();
        $tableUpdate = Village::orderBy('updated_at', 'desc')->first();

        if ($police_station->count() == 0) {
            Session::flash('info', 'You must have add police station before attempting to create a village.');
            return redirect()->back();
        }

        return view('admin.location.villages.index')
            ->with('countries', $country)
            ->with('divisions', $division)
            ->with('cities', $city)
            ->with('police_stations', $police_station)
            ->with('villages', Village::orderBy('country_id')->get())
            ->with('tableUpdate', $tableUpdate ? $tableUpdate->updated_at : Carbon::now());
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
            'country' => 'required',
            'division' => 'required',
            'city' => 'required',
            'police_station' => 'required',
            'village' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;
        $request['city_id'] = $request->city;
        $request['police_station_id'] = $request->police_station;

        Village::create($request->all());
        Session::flash('success', 'Village create successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Village $village)
    {
        $this->validate($request, [
            'country' => 'required',
            'division' => 'required',
            'city' => 'required',
            'police_station' => 'required',
            'village' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;
        $request['city_id'] = $request->city;
        $request['police_station_id'] = $request->police_station;

        $village->update($request->all());
        Session::flash('success', 'Village update successfully');
        return redirect()->route('admin.village.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location\Village  $village
     * @return \Illuminate\Http\Response
     */
    public function destroy(Village $village)
    {
        if ($village->delete()) {
            Session::flash('success', 'Village delete successfully');
            return back();
        }
    }
}
