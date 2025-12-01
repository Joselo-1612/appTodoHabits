<?php

namespace App\Http\Controllers\Api\Habit;

use App\Helpers\StatusModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Habit\StoreHabitRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Habit;
use Illuminate\Validation\ValidationException;

class HabitController extends Controller
{
    public function list() {

        $listHabits = Habit::where('hab_status', 1)->get();

        return ApiResponse::successResponse(
            $listHabits,
            'Query habits successfully',
            200
        );
    }

    public function register(StoreHabitRequest $request){

        try {
            $data = $request->validated();
            $newHabist = Habit::create($data);

            return ApiResponse::successResponse(
                $newHabist,
                "habit registed succesfully",
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

    public function update(StoreHabitRequest $request, string $habitId) {

        $habitDetail = Habit::findOrFail($habitId);
        $data = $request->validated();
        $habitDetail->update($data);

        return ApiResponse::successResponse(
            $habitDetail->getChanges(),
            "habit updated succesfully",
            201
        );
    }

    public function delete(string $habitId) {

        $habitDetail = Habit::findOrFail($habitId);
        $habitDetail->update([
            "hab_status" => StatusModel::INACTIVE
        ]);

        return ApiResponse::successResponse(
            $habitDetail->getChanges(),
            "habit deleted succesfully",
            200
        );
    }
}
