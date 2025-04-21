<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'concessions' => 'required|array|min:1',
            'concessions.*' => 'exists:concessions,id',
            'send_to_kitchen_time' => 'required|date|after:now',
        ];
    }
}