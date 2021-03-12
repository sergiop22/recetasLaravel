<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;

class InicioController extends Controller
{
    //
    public function index()
    {
    	//obtener recetas nuevas
    	$nuevas = Receta::latest()->take(5)->get();

    	return view('inicio.index', compact('nuevas'));
    }
}
