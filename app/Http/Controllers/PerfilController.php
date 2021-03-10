<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        $recetas = Receta::where('user_id', $perfil->user_id)->paginate(5);

        return view('perfiles.show', compact('perfil', 'recetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //policy por si alguien esta tratando de ver el formulario de editar sin ser la persona creadora del perfil
        $this->authorize('view', $perfil);

        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        //Ejecutar policy
        $this->authorize('update', $perfil);

        //validar
        $data = request()->validate([
            'name' => 'required',
            'biografia' => 'required'
        ]);

        //si el usuario sube una imagen
        if($request['imagen']) {
            $ruta_imagen = $request['imagen']->store('upload-perfiles', 'public');

            $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(600, 600);
            $img->save();

            $array_imagen = ['imagen' => $ruta_imagen];
        }

        //guardar informacion
        auth()->user()->name = $data['name'];
        auth()->user()->save();
        //eliminar name del data
        unset($data['name']);

        auth()->user()-perfil()->update( array_merge(
            $data, 
            $array_imagen ?? []
        ));

         return redirect()->action('RecetasController@index');
    }
}
