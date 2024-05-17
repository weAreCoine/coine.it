<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes()
    {
        return [
            'services' => __('Servizi'),
            'firstName' => __('Nome'),
            'lastName' => __('Cognome'),
            'email' => __('Indirizzo Email'),
            'phone' => __('Telefono'),
            'budget' => __('Budget'),
            'content' => __('Note'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'services.required' => __('Scegli almeno un servizio.'),
            'budget.required' => __('Seleziona il budget che intendi destinare al progetto.'),
            'required' => __(':attribute è un campo obbligatorio.'),
            'email' => __('Inserisci un indirizzo email valido.'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'services' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'budget' => 'required',
            'content' => 'required',
        ];
    }
}
