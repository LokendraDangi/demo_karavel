<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'name'=>'required|string',
            'module_id'=>'required',
            'route'=>'required|string',
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'module_id.required'=>'Please Select Module',
            'route.required'=>$this->required_messages('route'),

            'name.string'=>'Name must be string',
            'route.unique'=>'Route must be string',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
