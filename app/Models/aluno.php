<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'al_aluno';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nome',
        'cpf',
        'email'
    ];

    public function cursos()
    {
        return $this->belongsToMany(\App\Models\Curso::class);
    }
}
