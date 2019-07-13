<?php

namespace App\Http\Controllers\Admin\Location;

use Session;
use Illuminate\Http\Request;
use App\Models\Location\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableUpdate = Country::orderBy('updated_at', 'desc')->first();

        return view('admin.location.countries.index')
            ->with('countries', Country::orderBy('country')->get())
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
        ]);

        Country::create($request->all());
        Session::flash('success', 'Country create successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
         $this->validate($request, [
            'country' => 'required',
        ]);

        $country->update($request->all());
        Session::flash('success', 'Country update successfully');
        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        if ($country->delete()) {
            Session::flash('success', 'Country delete successfully');
        }
        return back();
    }
}
