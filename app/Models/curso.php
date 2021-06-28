<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'cr_curso';

    protected $fillable = [
        'nome',
        'imagem',
        'conteudo_programatico'
    ];
}
