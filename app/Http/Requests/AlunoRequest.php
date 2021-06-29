<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlunoRequest extends FormRequest
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
                'min:5',
                'max:200',
            ],
            'cpf' => [
                'required',
                'min:11',
                'max:11',
                Rule::unique('al_aluno')->ignore($id)
            ],
            'email' => [
                'email:rfc,dns',
                Rule::unique('al_aluno')->ignore($id)
            ]
        ];
    }
}
