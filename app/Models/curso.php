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

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nome',
        'imagem',
        'conteudo_programatico'
    ];

    public function alunos()
    {
        return $this->belongsToMany(\App\Models\Aluno::class);
    }
}
