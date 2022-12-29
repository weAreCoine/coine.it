<?php

    namespace App\Http\Requests;

    use Auth;
    use Illuminate\Foundation\Http\FormRequest;

    class UpdatePostRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        {
            return Auth::hasUser();
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules()
        {
            return [
                'title' => 'required',
                'language_code' => 'required|exists:languages,id',
                'category_id' => 'required|exists:categories,id',
                'content' => 'required',
                'tags' => 'exists:tags,id'
            ];
        }
    }
