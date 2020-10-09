<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name'=>'required|string|unique:tags|max:191',
            'rank'=>'required|integer|min:1',
            'slug'=>'required|string|unique:tags|max:191',
            'meta_keyword'=>'string|max:191',
            'meta_description'=>'string|max:191'

        ];
    }
    function messages()
    {
        return[
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
