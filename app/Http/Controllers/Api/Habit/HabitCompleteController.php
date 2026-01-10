<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiResponse;
use App\Models\HabitComplete;
use Illuminate\Validation\ValidationException;

class HabitCompleteController extends Controller
{
    public function doneOrSkippedHabit($habitId, $status, $note) {

        try {

            $habitComplete = HabitComplete::findOrFail($habitId);

            $habitComplete->update([
                "hac_is_done" => $status,
                "hac_note" => $note,
            ]);

            return ApiResponse::successResponse(
                $habitComplete->getChanges(),
                "habit complete updated successfully",
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
