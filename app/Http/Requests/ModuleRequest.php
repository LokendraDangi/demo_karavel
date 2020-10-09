<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
            'name'=>'required|string|unique:modules|max:191',
            'route'=>'required|string|unique:modules|max:191',

        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'route.required'=>$this->required_messages('route'),
            'name.unique'=>'Name is already taken',
            'route.unique'=>'Route is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
