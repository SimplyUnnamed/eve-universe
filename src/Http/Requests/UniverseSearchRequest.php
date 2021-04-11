<?php

namespace SimplyUnnamed\Seat\EveUniverse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UniverseSearchRequest extends FormRequest
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
        return [
            'type' => [
                'required',
                Rule::in(config('eveuniverse.types'))
            ],
            'term' => 'sometimes|required'
        ];
    }

    public function messages(){
        return [
            'type.in' => 'This is not a valid universe type'
        ];
    }
}
