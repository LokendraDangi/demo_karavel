<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductLineRequest extends FormRequest
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
        //category_id','subcategory_id','name','slug','price','discount','quantity','stock','feature_key',
        //'discount_key','short_description','description','meta_keyword','meta_description'
        return [
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'name'=>'required|string|unique:products|max:191',
            'slug'=>'required',
            'rank'=>'required',
        ];
    }
    function messages()
    {
        return[
            'name.required'=>$this->required_messages('name'),
            'rank.required'=>$this->required_messages('rank'),
            'slug.required'=>$this->required_messages('slug'),
            'category_id.required'=>'Please Select Category',
            'subcategory_id.required'=>'Please Select Sub Category',
            'name.unique'=>'Name is already taken',
            'slug.unique'=>'Slug is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }

}
