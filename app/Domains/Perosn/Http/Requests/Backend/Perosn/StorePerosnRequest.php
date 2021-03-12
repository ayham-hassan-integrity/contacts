<?php

namespace App\Domains\Perosn\Http\Requests\Backend\Perosn;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StorePerosnRequest.
 */
class StorePerosnRequest extends FormRequest
{
    /**
     * Determine if the perosn is authorized to make this request.
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
            'name'=>'nullable',
            'description'=>'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}