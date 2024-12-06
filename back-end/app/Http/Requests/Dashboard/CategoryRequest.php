<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    
    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \Illuminate\Validation\ValidationException($validator);
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
           'name' => [
            'required',
            'string',
            'max:40',
            Rule::unique('categories', 'name')->ignore($this->route('category')), // Correct usage of `ignore`
            ],
            'slug' => [
                'required',
                'string',
                'alpha_dash', // Ensures slug only contains letters, numbers, dashes, and underscores
                Rule::unique('categories', 'slug')->ignore($this->route('category')),
            ],
            'description' => 'nullable|string|max:150',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|in:active,archived',

        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a valid string.',
            'name.max' => 'The category name must not exceed 40 characters.',
            'name.unique' => 'This category name already exists, please choose a different one.',

            'slug.required' => 'The category slug is required.',
            'slug.string' => 'The slug must be a valid string.',
            'slug.unique' => 'The slug must be unique. Please choose another one.',
            'slug.alpha_dash' => 'The slug may only contain letters, numbers, dashes, and underscores.',
            
            'description.string' => 'The description must be a valid string.',
            'description.max' => 'The description must not exceed 150 characters.',
            
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpeg, png, jpg, or gif.',
            'image.max' => 'The image size must not exceed 2 MB.',
            
            'parent_id.exists' => 'The selected parent category does not exist.',
            
            'status.in' => 'The status must be either active or archived.',
        ];
    }
}
