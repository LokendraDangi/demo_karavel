<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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

        return  [
            'title'=>'required|string',
            'slug'=>'required|string',
            'description'=>'string',
            'slider_image'=>'required',
            'link'=>'required|string',
        ];
//        dd($a);
    }
    function messages()
    {
        return[
            'title.required'=>$this->required_messages('title'),
            'slug.required'=>$this->required_messages('slug'),
            'slider_image.required'=>'Please Select Image',
            'link.required'=>$this->required_messages('link'),
            'description.string'=>'Description must be String',
            //'image.string'=>'MetaKeyword must be String',
            'link.string'=>'Link must be String',
            'title.string'=>'Title must be String',
            'title.unique'=>'Name is already taken',
            'slug.unique'=>'Slug is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
