<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class PostUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'pagetitle' => 'required|string|min:5|max:255|unique:posts,pagetitle,'.$this->post,
            'alias' => 'required|string|min:2|max:255|unique:posts,alias,'.$this->post,


        ];
    }

    protected function prepareForValidation()
    {
        if($this->alias == null)
        {
            $this->merge([
                'alias' => Str::slug($this->pagetitle),
            ]);
        }
        else
        {
            $this->merge([
                'alias' => Str::slug($this->alias),
            ]);            
        }
    }    

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            request()->merge([
                'alias' => $this->request->get('alias')
            ]);

            // $validator->errors()->add('alias', 'Something is wrong with this field!');
        });
    }  

}
