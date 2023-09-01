<?php

namespace App\Rules;

use App\Models\Customer\BackgroundEvent;
use App\Models\Customer\Event;
use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class InAppointmentTime implements DataAwareRule, ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $appointments = 0;

        try {
            $startDate = Carbon::parse($value);
            $endDate = Carbon::parse($this->data["end"]);

            $appointments = BackgroundEvent::query()
                ->where(fn($q) =>
                $q->where("start_date", "<=", $value))
                ->where("end_date", ">=", $this->data["end"])
                ->where("start_time", "<=", $startDate->format("H:i"))
                ->where("end_time", ">=", $endDate->format("H:i"))
                ->where("day_of_week", $startDate->dayOfWeek)
                ->orWhere(fn($q) =>
                $q->where("start_date", "<=", $value)
                    ->whereNull("end_date")
                    ->where("start_time", "<=", $startDate->format("H:i"))
                    ->where("end_time", ">=", $endDate->format("H:i"))
                    ->where("day_of_week", $startDate->dayOfWeek)
                )->count();
        }catch( \Exception $e) {

        }

        if ($appointments === 0) {
            $fail("Csak ügyfél fogadási időben lehet foglalást létrehozni!");
        }
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}
