<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'autor_id' => 'required',
			'titulo' => 'required|string',
			'editorial' => 'string',
			'descripcion' => 'string',
			'tipo_documento_id' => 'required',
			'archivo_documento' => 'string',
			'portada_documento' => 'string',
        ];
    }
}
