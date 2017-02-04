<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    //

  public function upload(Request $request)
  {
    $picture = '';

    if ($request->hasFile('images')) {
      $files = $request->file('images');

      foreach($files as $file){
        $randomName = str_random(5);
        $imageName = $randomName.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $imageName);
        
      }
    }
      return response()->json(['success'=>'true']);
  }
  

  }
