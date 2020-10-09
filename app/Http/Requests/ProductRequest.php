<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'name'=>'required|string|unique:products|max:191',
            'price'=>'required',
            'quantity'=>'required',
            'productline_id'=>'required',
            'short_description'=>'string|max:191',
            'description'=>'string|max:191',
            'slug'=>'required|string|unique:products|max:191',

        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'productline_id.required'=>'Please Select ProductLine',
            'slug.required'=>$this->required_messages('slug'),
            'category_id.required'=>'Please Select Category',
            'subcategory_id.required'=>'Please Select Sub Category',
            'short_description.string'=>$this->messages_string('short_description'),
            'description.string'=>$this->messages_string('description'),
            'name.unique'=>'Name is already taken',
            'slug.unique'=>'Slug is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
    private function messages_string($field){
        return $field."must be String";
    }
}
