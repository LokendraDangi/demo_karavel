<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required | unique:users'. (request()->method()=="POST" ? '' : ',name,'.$this->id),
            //'name'=>'required|string|unique:users|max:191',
            'email'=>'required|string|unique:users',
            'password'=>'required|String',
            'role_id'=>'required',

        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'email.required'=>$this->required_messages('email'),
            'password.required'=>$this->required_messages('password'),
            'role_id.required'=>'Please Select Role',
            'name.unique'=>'Name is already taken',
            'email.unique'=>'Email is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
