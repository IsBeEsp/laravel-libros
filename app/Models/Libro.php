<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'resumen', 'pvp', 'stock', 'user_id'];

    // Este libro tiene un usuario autor.
    public function user(){
        return $this->belongsTo(User::class);
    }
}
