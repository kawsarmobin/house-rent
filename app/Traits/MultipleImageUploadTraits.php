<?php

namespace App\Traits;


use File;
use Image;
use App\Models\HouseImage;

trait MultipleImageUploadTraits
{

    // convert the UTC format to my format
    public function imagesUpload($house){
        
        /* Multiple image upload */
        $i = 0;

        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $image) {
                /* ****************
                |   Image upload 
                ***************** */
                /* make new name */
                $name = time() . '-' . $image->getClientOriginalName();
                /* upload image with new name */
                $image->move(public_path() . HouseImage::UPLOAD_PATH .'/', $name);


                /* ****************
                |   Resize image 
                ***************** */
                /* image path */
                $image_path = public_path(HouseImage::UPLOAD_PATH .'/'. $name);
                /* resize store path */
                $path = public_path(HouseImage::THUMB_UPLOAD_PATH);
                /* check resize image path folder and create the folder if does not exist */
                if (!is_dir($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                /* image resize and store */
                Image::make($image_path)->resize(320, 240)->save(public_path(HouseImage::THUMB_UPLOAD_PATH .'/'. $name));
                /* Image resize end */


                /* Process data to store database */
                $data[$i]['house_id'] = $house->id;
                $data[$i]['image'] = $name;
                $i++;
            }
        }

        return $data;
        
    }
}