<?php

namespace App\Http\Requests;

use App\Rules\FreeAppointment;
use App\Rules\InAppointmentTime;
use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => "required",
            "last_name" => "required",
            "start" => [
                "required",
                "date_format:Y-m-d H:i",
                new FreeAppointment(),
                new InAppointmentTime()
            ],
            "end" => [
                "required",
                "date_format:Y-m-d H:i",
            ]
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Keresztnév megadása kötelező!",
            "last_name.required." => "Vezetéknév megadása kötelező!",
            "start.required" => "Kezdő dátum megadása kötelező!",
            "end.required" => "Vég dátum megadása kötelező!",
            "start.date_format" => "Érvénytelen dátum formátum! Elvárt: ÉÉÉÉ-HH-NN ÓÓ:PP",
            "end.date_format" => "Érvénytelen dátum formátum! Elvárt: ÉÉÉÉ-HH-NN ÓÓ:PP",
        ];
    }
}
