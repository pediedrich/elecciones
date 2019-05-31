<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



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



      $v_grito = 1205;
      $v_pays = 420;
      $v_otro = 458;

      $result = $v_grito+$v_pays+$v_otro;

      $p_grito = round($v_grito * 100 / $result, 2) . '%';
      $p_pays = round($v_pays * 100 / $result, 2) . '%';
      $p_otro = round($v_otro * 100 / $result, 2) . '%';

      $sublemas[] = ['nombre' => 'El Grito de mis calles', 'votos' => $v_grito, 'porc' => $p_grito, 'letra' => 'K'];
      $sublemas[] =  ['nombre' => 'PAyS', 'votos' => $v_pays, 'porc' => $p_pays, 'letra' => 'L'];
      $sublemas[] =  ['nombre' => 'El OTRO Grito de mis calles', 'votos' => $v_otro, 'porc' => $p_otro, 'letra' => 'M'];

      return view('home',compact('result','sublemas'));
    }
}
