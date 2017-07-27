<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function persist() {
        $admin = User::all()->sortBy('created_at')->first();
        $client = User::create($this->only(['name', 'email', 'password']));
        \Mail::to($admin)->send(new NewClientNotify($client));
        \Mail::to($client)->send(new RegisteredNotify($client));
    }
}
