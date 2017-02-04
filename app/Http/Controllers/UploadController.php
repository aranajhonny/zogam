<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use App\Images;
use App\Revision; 
use App\Image_rev;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{


  public function upload(Request $request)
  {
   $rev = new Revision();  

   $rev->vehiculo_id = $request->_idAuto;
   $rev->tipo = $request->_tipoRev;
   $rev->fecha = $request->_fechaRev;

   $rev->save();

   $revId = $rev->id;

   if ($request->hasFile('images')) {
    $files = $request->file('images');

    foreach($files as $file){
      $image = new Images();  
      $imageRev = new Image_rev();  
      $randomName = str_random(5);
      $imageName = $randomName.'.'.$file->getClientOriginalExtension();
      $image->nombre = $imageName;
      $image->save();
      $imageId = $image->id;
      $imageRev->image_id = $imageId;
      $imageRev->revision_id = $revId;
      $imageRev->save();
      $file->move(public_path('images'), $imageName);
    }
  }

  return response()->json($request);
}


}
