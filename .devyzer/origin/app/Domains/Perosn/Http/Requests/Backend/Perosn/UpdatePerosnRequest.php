<?php

namespace App\Domains\Perosn\Http\Requests\Backend\Perosn;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdatePerosnRequest.
 */
class UpdatePerosnRequest extends FormRequest
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

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__('You can not update this record.'));
    }
}