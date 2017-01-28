<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function edit(Vehiculo $vehiculo)
    {
        //
    }


    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
