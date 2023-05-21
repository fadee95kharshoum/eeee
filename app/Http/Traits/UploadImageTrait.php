<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait UploadImageTrait{

    /**
     * This Function Store File In Guard "Admin" By Adding Folder 'Backend\'.$Name Of Folder
     *
     * @return void
     */
    public function uploadImage(Request $request, $folderName){
        $image = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs($folderName, $image, 'backend');
        return $path;
    }
}
