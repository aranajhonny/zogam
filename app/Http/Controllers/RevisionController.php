<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use App\Revision;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RevisionController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $tiposRev = array('recepcion','desarmado','latoneria','preparacion','pintura','pulitura','limpieza');

      $auto = Vehiculo::find($id);

      if ( !$auto ) {
        abort(404);
      }

      $revs = Vehiculo::find($id)->revisions;

      foreach ($revs as $rev) {
        if ($rev->tipo == 'desarmado') {
          $tiposRev = array_except($tiposRev, [1]);
        }
        elseif ($rev->tipo == 'latoneria') {
          $tiposRev = array_except($tiposRev, [2]);
        }
        elseif ($rev->tipo == 'pintura') {
          $tiposRev = array_except($tiposRev, [4]);
        }
        elseif ($rev->tipo == 'preparacion') {
          $tiposRev = array_except($tiposRev, [3]);
        }
        elseif ($rev->tipo == 'pulitura') {
          $tiposRev = array_except($tiposRev, [5]);
        }
        elseif ($rev->tipo == 'limpieza') {
          $tiposRev = array_except($tiposRev, [6]);
        }
        elseif ($rev->tipo == 'recepcion') {
          $tiposRev = array_except($tiposRev, [0]);
        }
      }

      return view('revision.nueva', compact('auto', 'revs', 'tiposRev'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function show(Revision $revision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function edit(Revision $revision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Revision $revision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Revision  $revision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Revision $revision)
    {
        //
    }
}
