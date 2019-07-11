<?php

namespace App\Http\Controllers\Admin;

use App\Models\HouseInfo;
use App\Models\HouseImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\MultipleImageUploadTraits;

class HouseImagesController extends Controller
{
    use MultipleImageUploadTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HouseInfo $house)
    {
        return view('admin.house_images.create')
            ->with('house_info', $house);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, HouseInfo $house)
    {
        /* Multiple image upload */
        $data = $this->imagesUpload($house);
        HouseImage::insert($data);

        return redirect()->route('admin.house-info.show', $house->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function show(HouseImage $houseImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseImage $houseImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseImage $houseImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HouseImage  $houseImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HouseInfo $house, HouseImage $image)
    {
        $image->delete();
        unlink(public_path(HouseImage::UPLOAD_PATH.'/'.$image->image));
        unlink(public_path(HouseImage::THUMB_UPLOAD_PATH.'/'.$image->image));

        return back();
    }
}
