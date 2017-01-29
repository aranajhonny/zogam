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
        //
    }

    public function store(Request $request)
    {
        //
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
