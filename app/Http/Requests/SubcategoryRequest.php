<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            'name' => 'required | unique:subcategories'. (request()->method()=="POST" ? '' : ',name,'.$this->id),
            'rank'=>'required|integer|min:1',
            'slug'=>'required|string|unique:subcategories',
            'meta_keyword'=>'string|max:191',
            'meta_description'=>'string|max:191'
        ];
    }
    function messages()
    {
        return[
            'category_id.required'=>'Please Select Category',
            'name.required'=>$this->required_messages('name'),
            'rank.required'=>$this->required_messages('rank'),
            'slug.required'=>$this->required_messages('slug'),
            'meta_keyword.string'=>'Meta Keyword must be String',
            'metea_description.string'=>'Meta Description must be String',
            'name.unique'=>'Name is already taken',
            'slug.unique'=>'Slug is already taken',
        ];
    }
    private function required_messages($field){
        return "Please Enter ".$field;
    }
}
