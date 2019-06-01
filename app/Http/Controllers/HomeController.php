<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Result;
use App\School;
use App\Lema;
use App\Sublema;
use App\Charge;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
      //$result = Result::all();

      //obtengo el municipio del usuario logueado
      $municipality_id = Auth::user()->municipality_id;

      //Escuelas del circuito
      $schools = School::whereMunicipalityId($municipality_id)->get();

      $lemas = Lema::get();

      $a_total = array();
      foreach ($lemas as $lema) {
        foreach (Charge::whereLevel(1)->get() as $charge) {

          //obtengo el total por municipio de cada cargo dentro del lema
          $votes = Result::whereLemaId($lema->id)->whereChargeId($charge->id)->sum('total');

          $a_lemas[$charge->id]['name'] = $charge->name;
          $a_lemas[$charge->id]['votes'] = $votes;

          $d_lemas[$lema->id]['name'] = $lema->name;
          $d_lemas[$lema->id]['number'] = $lema->number;
          $d_lemas[$lema->id]['charges'] = $a_lemas;

          // en a_total guardo el total de votes por cargo para sacar porcentajes
          if(isset($a_total[$charge->id])){
            $a_total[$charge->id] += $votes;
          }else {
            $a_total[$charge->id] = 0;
            $a_total[$charge->id] += $votes;
          }
        }

        unset($votes);
        $sublemas = $lema->sublemas();
        foreach ($sublemas as $sublema) {
          foreach (Charge::whereLevel(2)->get() as $charge) {
            //obtengo el total de votes por cargo dentro del sublema
            $votes = Result::whereSublemaId($sublema->id)->whereChargeId($charge->id)->sum('total');

            //nombre y total de votos en un array
            $s_charges[$charge->id]['name'] = $charge->name;
            $s_charges[$charge->id]['votes'] = $votes;

            // array datos completos de un sublema
            $a_sublemas[$sublema->id]['charges'] = $s_charges;
            $a_sublemas[$sublema->id]['lema_id'] = $sublema->lema_id;
            $a_sublemas[$sublema->id]['name'] = $sublema->name;
            $a_sublemas[$sublema->id]['letter'] = $sublema->letter;

            if(isset($a_total[$charge->id])){
              $a_total[$charge->id] += $votes;
            }else {
              $a_total[$charge->id] = 0;
              $a_total[$charge->id] += $votes;
            }
          }
        }
      }

      foreach ($d_lemas as $l_key => $l_datos) {
        // busco la cantidad de votos por cargo de cada sublema
        // comparo con el total de cada cargo para sacar el porcentaje
        foreach ($a_total as $lt_key => $lt_value) {
          foreach ($l_datos['charges'] as $lc_key => $lc_value) {
            if ($lt_key == $lc_key) {
              $l_porc = round($lc_value['votes'] * 100 / $lt_value, 2) . '%';
              $d_lemas[$l_key]['charges'][$lc_key]['porc'] = $l_porc;
              unset($l_porc);
            }
          }
        }

        foreach ($a_sublemas as $s_key => $s_value) {
          // busco la cantidad de votos por cargo de cada sublema
          // comparo con el total de cada cargo para sacar el porcentaje
          foreach ($a_total as $t_key => $t_value) {
            foreach ($s_value['charges'] as $c_key => $c_value) {
              if ($t_key == $c_key) {
                $s_porc = round($c_value['votes'] * 100 / $t_value, 2) . '%';
                $a_sublemas[$s_key]['charges'][$c_key]['porc'] = $s_porc;
                unset($s_porc);
              }
            }
          }
          if ($s_value['lema_id'] == $l_key) {
            $sublemas_x_lema[$s_key] = $a_sublemas[$s_key];
          }
        }
        $d_lemas[$l_key]['sublemas'] = $sublemas_x_lema;
        unset($sublemas_x_lema);
      }
    //dd($d_lemas);

      return view('home',compact('d_lemas'));
    }
}
