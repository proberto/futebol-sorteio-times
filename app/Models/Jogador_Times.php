<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador_Times extends Model
{
    use HasFactory;

    protected $table = 'jogador_times';
    public $timestamps = true;


    protected $fillable = [
        'id_time',
        'id_jogador',
        'id_jogo',
    ];
}
