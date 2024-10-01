<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title'=> 'required|string|max:100|min:3',
            'txt'=> 'required|string|min:10',
            'reading_time'=> 'required|integer|min:1|max:10',
        ];
    }

   /**
     * Get the error message for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return[
            'title.required' => 'Il titolo è obbligatorio',
            'title.string' => 'Il titolo deve essere una stringa',
            'title.max' => 'Il titolo non può superare i :max caratteri',
            'title.min' => 'Il titolo deve essere almeno di :min caratteri',
            'txt.required' => 'Il contenuto è obbligatorio',
            'txt.string' => 'Il contenuto deve essere una stringa',
            'txt.min' => 'Il contenuto deve essere almeno di :min caratteri',
            'reading_time.required' => 'Il tempo di lettura è obbligatorio',
            'reading_time.integer' => 'Il tempo di lettura deve essere un numero intero',
            'reading_time.min' => 'Il tempo di lettura deve essere almeno di :min caratteri',
            'reading_time.max' => 'Il tempo di lettura non può superare i :max minuti',

            
            
            
            
        ];
    }
    
}
