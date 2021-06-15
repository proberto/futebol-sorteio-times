<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presenca extends Model
{
    use HasFactory;

    protected $table = 'presencas';
    public $timestamps = true;


    protected $fillable = [
        'id_jogador',
        'presenca',
        'id_jogo',
    ];
}
