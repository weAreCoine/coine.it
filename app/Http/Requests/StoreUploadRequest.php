<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreUploadRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize(): bool
        {
            return auth()->hasUser();
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, mixed>
         */
        public function rules()
        {
            return [
                'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }
    }
