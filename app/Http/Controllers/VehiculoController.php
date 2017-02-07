<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

      Validator::make($request->all(), [
        'placa'=> 'required|max:6',
        'marca' => 'required',
        'modelo' => 'required',
        'anio' => 'required|max:4|',
        'serial_motor' => 'required',
        'serial_carro' => 'required',
        'color' => 'required',
        'tipo' => 'required',
        'propietario' => 'required',
        'telf_prop' => 'required',
        'email_prop' => 'required|email|', 
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

      return redirect('vehiculo/create')->with('message','Ha sido guardado exitosamente!');
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
        'placa'=> 'required|max:6',
        'marca' => 'required',
        'modelo' => 'required',
        'anio' => 'required|max:4|size:4',
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

    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
  }
