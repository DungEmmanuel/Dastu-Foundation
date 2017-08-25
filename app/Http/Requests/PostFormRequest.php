<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostFormRequest extends Request
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
        $rules= [
        'title' => 'required',
        'content'=> 'required',
        'categories' => 'required',
       ];    


        $ncnt = count($this->input('images'));
        foreach(range(0, $ncnt) as $index) 
        {
            $rules['images.'.$index] = 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
       
       return $rules;
        
    }
}
