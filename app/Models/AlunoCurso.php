<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlunoCurso extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'aluno_curso';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'aluno_id',
        'curso_id',
        'matricula',
    ];

    public function salva($input)
    {
        
        foreach($input['curso'] as $curso):
            $input['curso_id'] = $curso;
            $input['matricula'] = date('Ymd').rand(1,4000).$input['aluno_id'].$input['curso_id'];
            parent::create($input);
        endforeach;


    }

    public function alunos()
    {
        return $this->belongsToMany(App\Models\Aluno::class, 'aluno_id');
    }

    public function cursos()
    {
        return $this->belongsToMany(App\Models\Cursos::class, 'aluno_id');
    }
}
