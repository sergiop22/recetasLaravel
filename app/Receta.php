<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

	protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];

    public function categoria()
    {
    	return $this->belongsTo(CategoriaReceta::class);
    }

    public function autor()
    {
    	return $this->belongsTo(User::class, 'user_id');//user_id es el foreing key
    }

    //likes que ha recibido una receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }
}
