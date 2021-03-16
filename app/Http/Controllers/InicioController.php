<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Receta;
use App\CategoriaReceta;

class InicioController extends Controller
{
    //
    public function index()
    {
    	//obtener recetas nuevas
    	$nuevas = Receta::latest()->take(5)->get();

    	//obtener todas las categorias
    	$categorias = CategoriaReceta::all();

    	//agrupas recetas por categoria
    	$recetas = [];
    	foreach ($categorias as $categoria) {
    		$recetas[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
    	}

    	return view('inicio.index', compact('nuevas', 'recetas'));
    }
}
