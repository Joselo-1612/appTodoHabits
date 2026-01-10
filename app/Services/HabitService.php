<?php

namespace App\Services;

use App\Helpers\HabitRecurrence;
use App\Http\Controllers\Controller;
use App\Models\Habit;

class HabitService extends Controller
{

    public function __construct(
        protected HabitDayService $habitDayService
    ) {}

    public function registerHabitAndHabitDays($data) {

        $newHabit = Habit::create($data);

        if ($newHabit->getHabTypeRecurrence() == HabitRecurrence::PERSONALIZADO
        && count($data["hab_days"]) > 0) {

            foreach ($data["hab_days"] as $day) {
                $newHabit->habitDays()->create([
                    'had_day' => $day,
                ]);
            }
        }

        return $newHabit;
    }
}
