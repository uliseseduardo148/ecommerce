<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug', 
        'description',
        'price',
        'image_path',
        'status'
    ];

    /**
     * Mmove the file to the corresponding folder 
     * and return the image name
     *
     * @param  Request  $request
     * @return $fileName
     */

    public function uploadImage($request){
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $fileName  = $file->getClientOriginalName();
            $file->move(public_path("images/"),$fileName);
            return $fileName;
        }
    }
}
