<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(2);
        return [
            'nome' => [
                'required',
                'min:3',
                'max:200',
                //"unique:cr_curso,nome,{$id},id",
                Rule::unique('cr_curso')->ignore($id)
            ],
            'imagem' => ['nullable', 'image'],
            'conteudo_programatico' => ['required', 'min:5', 'max:5000'],
        ];
    }
}
