<?php

namespace App\Rules;

use App\Models\Customer\Event;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class FreeAppointment implements DataAwareRule, ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $appointments = Event::query()
            ->where(fn($q) => $q->where("start", ">", $value))->where("start", "<", $this->data["end"])
            ->orWhere(fn($q) => $q->where("end", ">", $value))->where("end", "<", $this->data["end"])
            ->count();
        if ($appointments > 0) {
            $fail("A megadott időszakra már van bejegyezve időpont!");
        }
    }

    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }
}
