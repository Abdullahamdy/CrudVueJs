<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SkillRequest extends FormRequest
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
            'name'=>['required','min:3','max:20'],
            'slug'=>['required',Rule::unique('skills')->ignore($this->skill)],
//            'slug'=>['required','unique:skills,slug,'.$this->skill->id],
        ];
    }
}
