<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=>'required|string|max:191',
            'phone'=>'required',
            'address'=>'required|string',
            'email'=>'required|max:191',
            'logo'=>'required',
            'map_link'=>'required',
            'facebook_link'=>'required',
            'twitter_link'=>'required',
            'instagram_link'=>'required',
            'youtube_link'=>'required',
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'phone.required'=>$this->required_messages('phone'),
            'address.required'=>$this->required_messages('address'),
            'email.required'=>$this->required_messages('email'),
            'logo.required'=>$this->required_messages('logo'),
            'map_link.required'=>$this->required_messages('map_link'),
            'facebook_link.required'=>$this->required_messages('facebook_link'),
            'twitter_link.required'=>$this->required_messages('twitter_link'),
            'instagram_link.required'=>$this->required_messages('instagram_link'),
            'youtube_link.required'=>$this->required_messages('youtube_link'),
            'name.string'=>'Name must be String',
            'address.string'=>'Address must be String',

        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
