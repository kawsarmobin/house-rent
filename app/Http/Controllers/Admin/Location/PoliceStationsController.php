<?php

namespace App\Http\Controllers\Admin\Location;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Location\Country;
use App\Models\Location\Division;
use App\Http\Controllers\Controller;
use App\Models\Location\PoliceStation;

class PoliceStationsController extends Controller
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
        $tableUpdate = PoliceStation::orderBy('updated_at', 'desc')->first();

        if ($division->count() == 0) {
            Session::flash('info', 'You must have add division before attempting to create a police station.');
            return redirect()->back();
        }

        return view('admin.location.police_stations.index')
            ->with('countries', $country)
            ->with('divisions', $division)
            ->with('police_stations', PoliceStation::orderBy('country_id')->get())
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
            'police_station' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;

        PoliceStation::create($request->all());
        Session::flash('success', 'Police station create successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location\PoliceStation  $policeStation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PoliceStation $policeStation)
    {
        $this->validate($request, [
            'country' => 'required',
            'division' => 'required',
            'police_station' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;

        $policeStation->update($request->all());
        Session::flash('success', 'Police station update successfully');
        return redirect()->route('admin.police-station.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location\PoliceStation  $policeStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PoliceStation $policeStation)
    {
        if ($policeStation->delete()) {
            Session::flash('success', 'Police station delete successfully');
            return back();
        }
    }
}
