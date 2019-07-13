<?php

namespace App\Http\Controllers\Admin\Location;

use Session;
use Illuminate\Http\Request;
use App\Models\Location\City;
use App\Models\Location\Country;
use App\Models\Location\Division;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class CitiesController extends Controller
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
        $tableUpdate = City::orderBy('updated_at', 'desc')->first();

        if ($division->count() == 0) {
            Session::flash('info', 'You must have add division before attempting to create a city.');
            return redirect()->back();
        }

        return view('admin.location.cities.index')
            ->with('countries', $country)
            ->with('divisions', $division)
            ->with('cities', City::orderBy('country_id')->get())
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
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;

        City::create($request->all());
        Session::flash('success', 'City create successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'country' => 'required',
            'division' => 'required',
            'city' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;

        $city->update($request->all());
        Session::flash('success', 'City update successfully');
        return redirect()->route('admin.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        if ($city->delete()) {
            Session::flash('success', 'City delete successfully');
            return back();
        }
    }
}
