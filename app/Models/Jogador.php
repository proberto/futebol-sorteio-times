<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    use HasFactory;

    protected $table = 'jogadors';
    public $timestamps = true;


    protected $fillable = [
        'name',
        'nivel',
        'goleiro',
    ];
}
