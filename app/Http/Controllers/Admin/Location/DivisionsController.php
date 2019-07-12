<?php

namespace App\Http\Controllers\Admin\Location;

use Session;
use Illuminate\Http\Request;
use App\Models\Location\Division;
use App\Http\Controllers\Controller;
use App\Models\Location\Country;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::orderBy('country')->get();

        if ($country->count() == 0) {
            Session::flash('info', 'You must have add country before attempting to create a division.');
            return redirect()->back();
        }

        return view('admin.location.divisions.index')
            ->with('countries', $country)
            ->with('divisions', Division::orderBy('country_id')->get())
            ->with('tableUpdate', Division::orderBy('updated_at', 'desc')->first()->updated_at);
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
            'division' => 'required'
        ]);

        $request['country_id'] = $request->country;

        Division::create($request->all());
        Session::flash('success', 'Division create successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $this->validate($request, [
            'country' => 'required',
            'division' => 'required'
        ]);

        $request['country_id'] = $request->country;

        $division->update($request->all());
        Session::flash('success', 'Division update successfully');
        return redirect()->route('admin.division.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        if ($division->delete()) {
            Session::flash('success', 'Division delete successfully');
            return back();
        }
    }
}
