<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use App\Images;
use App\Revision; 
use App\Image_rev;
use App\Vehiculo;


use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{

    public function mivehiculo($placa)
    {
      return view('vehiculos/create');
    }

    public function getImages($placa)
    {
      $auto = Vehiculo::where('placa', $placa)->first();

      if (!$auto) {
        $msj = array('status' => 'error');
        return $msj;
      }

      $results = DB::select('SELECT id  FROM revisions WHERE vehiculo_id  = :id', ['id' => $auto->id]);

      $array = array();
      $desarmado = array();$latoneria= array();$pintura = array();$preparacion = array();$pulitura = array();$limpieza= array();$recepcion = array();
     
       foreach ($results as $value) {
        $images = DB::select('
              SELECT i.image_id, r.tipo,r.fecha, images.nombre 
              FROM image_revs as i 
              inner JOIN revisions as r 
              ON i.revision_id = r.id 
              INNER JOIN images 
              ON i.image_id = images.id 
              WHERE revision_id = :id', ['id' => $value->id]);
        foreach ($images as $image){
          if ($image->tipo == 'desarmado') {
            array_push($desarmado,$image);
          }
          elseif ($image->tipo == 'latoneria') {
            array_push($latoneria,$image);
          }
          elseif ($image->tipo == 'pintura') {
            array_push($pintura,$image);
          }
          elseif ($image->tipo == 'preparacion') {
            array_push($preparacion, $image);
          }
          elseif ($image->tipo == 'pulitura') {
            array_push($pulitura,$image);
          }
          elseif ($image->tipo == 'limpieza') {
            array_push($limpieza,$image); 
          }
          elseif ($image->tipo == 'recepcion') {
            array_push($recepcion,$image);
          }
        }
        $array = array('desarmado'=>$desarmado,'latoneria'=>$latoneria,'pintura'=>$pintura,'preparacion'=>$preparacion,'pulitura'=>$pulitura,'limpieza'=>$limpieza,'recepcion'=>$recepcion);      
      }

        // SELECT id FROM revisions WHERE vehiculo_id = 1

        // SELECT image_id FROM image_revs WHERE revision_id = 1

        // SELECT nombre FROM images WHERE id = 10

      return array('data'=>$array,'auto'=>$auto);

    }
  public function upload(Request $request)
  {
   $rev = new Revision();  
   $auto = new Vehiculo();
   $idAuto = $request->_idAuto;
   $auto = Vehiculo::find($idAuto);
   if ($request->_tipoRev == "armado") {
     $auto->status = "completo";
   } else {
     $auto->status = $request->_tipoRev;
   }
   $auto->save();

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
  return redirect('revision/'. $request->_idAuto )->with('message','Ha sido guardado exitosamente!');
}


}
