<?php

namespace App\Http\Controllers;

use Storage;
use App\Images;
use App\Revision; 
use App\Image_rev;
use App\Vehiculo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $autos = DB::table('vehiculos')->orderBy('id', 'desc')->paginate(10);

      return view('dashboard', ['autos' => $autos]);
    }

    public function create()
    {
      return view('vehiculos/create');
    }

 
    public function store(Request $request){
      $auto = Vehiculo::where('placa', $request->placa)->first();

      if ($auto) {
        return redirect('vehiculo/create')
        ->with('status', 'El vehiculo ya se encuentra registrado!');
      }

      Validator::make($request->all(), [
        'placa'=> 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'anio' => 'required',
        'serial_motor' => 'required',
        'serial_carro' => 'required',
        'color' => 'required',
        'tipo' => 'required',
        'propietario' => 'required',
        'telf_prop' => 'required',
        'email_prop' => 'required',
        ])->validate();

      $vehiculo = new Vehiculo();
      $vehiculo->placa = $request->placa;
      $vehiculo->marca = $request->marca;
      $vehiculo->modelo = $request->modelo;
      $vehiculo->anio = $request->anio;
      $vehiculo->serial_motor = $request->serial_motor;
      $vehiculo->serial_carro = $request->serial_carro;
      $vehiculo->color = $request->color;
      $vehiculo->tipo = $request->tipo;
      $vehiculo->propietario = $request->propietario;
      $vehiculo->telf_prop = $request->telf_prop;
      $vehiculo->email_prop = $request->email_prop;
      $vehiculo->status = 'Ninguno';
      $vehiculo->save();

      return redirect('home')->with('message','El vehiculo ha sido guardado exitosamente!');
    }


    public function edit($id)
    {
        // edit function here
      $auto = Vehiculo::find($id);

        // return to 404 page
      if ( !$auto ) {
        abort(404);
      }
        // display the article to single page
      return view('vehiculos.edit')->with('auto',$auto);
    }


    public function update(Request $request, $id)
    {

      $this->validate($request, [
        'placa'=> 'required',
        'marca' => 'required',
        'modelo' => 'required',
        'anio' => 'required',
        'serial_motor' => 'required',
        'serial_carro' => 'required',
        'color' => 'required',
        'tipo' => 'required',
        'propietario' => 'required',
        'telf_prop' => 'required',
        'email_prop' => 'required',
        ]);

      $auto = Vehiculo::find($id);
      $auto->placa = $request->placa;
      $auto->marca = $request->marca;
      $auto->modelo = $request->modelo;
      $auto->anio = $request->anio;
      $auto->serial_motor = $request->serial_motor;
      $auto->serial_carro = $request->serial_carro;
      $auto->color = $request->color;
      $auto->tipo = $request->tipo;
      $auto->propietario = $request->propietario;
      $auto->telf_prop = $request->telf_prop;
      $auto->email_prop = $request->email_prop;
      // save all data
      $auto->save();
      //redirect page after save data
      return redirect('vehiculo/'.$id.'/edit')->with('message','Ha sido actualizado exitosamente!');
    }

    public function show(Request $request, $placa)
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
          if ($image->tipo == 'recepcion') {
            array_push($recepcion,$image);
          }
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
        }
        $array = array('recepcion'=>$recepcion,'desarmado'=>$desarmado,'latoneria'=>$latoneria,'pintura'=>$pintura,'preparacion'=>$preparacion,'pulitura'=>$pulitura,'limpieza'=>$limpieza);      
    }
    // if (!$array) {
    //   $msj = array('status' => 'error');
    //   return $msj;
    // }
    return view('vehiculos.buscar', ['data' => $array, 'auto' => $auto]);

  }

    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
  }
