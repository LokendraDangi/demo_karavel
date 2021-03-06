<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'=>'required|string|max:191'
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),

            'name.string'=>'Name must be String',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
