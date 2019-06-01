<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Result;
use App\Table;
use App\User;
use App\Municipality;
use App\Lema;
use App\Sublema;
use App\Charge;
use App\School;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function saveVotes(Request $request)
    {

      $id = $request->table_id;

      //busco la mesa correspondiente a la carga y updateo los campos necesarios
      $table = Table::find($id);
      $table->state = "cargada";
      $table->null_votes = $request->null_votes;
      $table->blank_votes = $request->blank_votes;
      $table->total_votes = $request->total_votes;
      $table->update();

      //recorro lemas y guardo
      $lemas = $request->lemas;
      foreach ($lemas as $lema_id => $charges) {
        foreach ($charges as $charge_id => $total) {
          if ($total == 0 || is_null($total)) {
            $total = 0;
          }
          $result = new Result();
          $result->table_id = $id;
          $result->lema_id = $lema_id;
          $result->charge_id = $charge_id;
          $result->total = $total;
          $result->save();
        }
      }

      /**
       * CARGO LOS DATOS DE LA MESA
       * Sublemas - Cargos y cantidad de votos
       */
      $sublemas = $request->sublemas;
      foreach ($sublemas as $sublema_id => $charges) {
        foreach ($charges as $charge_id => $total) {
          if ($total == 0 || is_null($total)) {
            $total = 0;
          }
          $result = new Result();
          $result->table_id = $id;
          $result->sublema_id = $sublema_id;
          $result->charge_id = $charge_id;
          $result->total = $total;
          $result->save();
        }
      }

    }

}
