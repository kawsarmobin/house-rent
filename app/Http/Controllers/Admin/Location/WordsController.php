<?php

namespace App\Http\Controllers\Admin\Location;

use Session;
use Illuminate\Http\Request;
use App\Models\Location\Word;
use App\Models\Location\City;
use Illuminate\Support\Carbon;
use App\Models\Location\Village;
use App\Models\Location\Country;
use App\Models\Location\Division;
use App\Http\Controllers\Controller;
use App\Models\Location\PoliceStation;

class WordsController extends Controller
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
        $village = Village::orderBy('village')->get();
        $tableUpdate = Word::orderBy('updated_at', 'desc')->first();

        if ($village->count() == 0) {
            Session::flash('info', 'You must have add village before attempting to create a word.');
            return redirect()->back();
        }

        return view('admin.location.words.index')
            ->with('countries', $country)
            ->with('divisions', $division)
            ->with('cities', $city)
            ->with('police_stations', $police_station)
            ->with('villages', $village)
            ->with('words', Word::orderBy('country_id')->get())
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
            'word' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;
        $request['city_id'] = $request->city;
        $request['police_station_id'] = $request->police_station;
        $request['village_id'] = $request->village;

        Word::create($request->all());
        Session::flash('success', 'Word create successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        $this->validate($request, [
            'country' => 'required',
            'division' => 'required',
            'city' => 'required',
            'police_station' => 'required',
            'village' => 'required',
            'word' => 'required',
        ]);

        $request['country_id'] = $request->country;
        $request['division_id'] = $request->division;
        $request['city_id'] = $request->city;
        $request['police_station_id'] = $request->police_station;
        $request['village_id'] = $request->village;

        $word->update($request->all());
        Session::flash('success', 'Word update successfully');
        return redirect()->route('admin.word.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        if ($word->delete()) {
            Session::flash('success', 'Word delete successfully');
            return back();
        }
    }
}
