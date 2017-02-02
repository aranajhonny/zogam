<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //

    public function upload(Request $request){
      $file = $request->file('images');
      $fileName = $file->getClientOriginalName();
      $request->file('images')->move("image/",$fileName);

      return \Response::json(array('success' => true));
    }
}
