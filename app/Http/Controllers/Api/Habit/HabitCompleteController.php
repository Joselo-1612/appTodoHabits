<?php

namespace App\Http\Controllers;

use App\Helpers\StatusHabitComplete;
use App\Http\Requests\Habit\StoreCompleteHabitRequest;
use App\Http\Responses\ApiResponse;
use App\Models\HabitComplete;
use Illuminate\Validation\ValidationException;

class HabitCompleteController extends Controller
{
    public function doneHabit(StoreCompleteHabitRequest $request) {

        try {
            $data = $request->validated();

            $newHabit = HabitComplete::create($data);

            return ApiResponse::successResponse(
                $newHabit,
                'done habit successfully',
                201
            );

        } catch (ValidationException $e) {
            return ApiResponse::errorResponse(
                'Error validating request data',
                422,
                $e->getMessage()
            );
        }

    }

    public function skippedHabit($habitId){

        try {

            $habitComplete = HabitComplete::findOrFail($habitId);

            $habitComplete->update([
                "hac_is_done" => StatusHabitComplete::SKIPPED
            ]);

            return ApiResponse::successResponse(
                $habitComplete->getChanges(),
                'skipped habit successfully',
                200
            );

        } catch (ValidationException $e) {
            return ApiResponse::errorResponse(
                'Error validating request data',
                422,
                $e->getMessage()
            );
        }
    }
}
