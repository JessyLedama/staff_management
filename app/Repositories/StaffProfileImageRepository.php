<?php
/**
 * User: Jessy Ledama
 * Date: 24/6/2020
 */

namespace App\Repositories;


use Illuminate\Http\Request;

class StaffProfileImageRepository
{

    public function saveProfileImage(Request $request, $path = 'app/public/staff'){
        if ($request->hasFile('image')){
            $filename = $request['name'] . time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(storage_path($path), $filename);
            return $filename;
        }
        else {
            return false;
        }
    }


}