<?php
    namespace App\Http\Responses;

    use Illuminate\Http\JsonResponse;

    class ApiResponse {
        public static function successResponse(array $data, int $status = 200): JsonResponse
        {
            return response()->json($data)->setStatusCode($status);
        }

        public static function errorResponse(string $message, int $status = 400, array $errors = []): JsonResponse
        {
            return response()->json([
                'message' => $message,
                'errors' => $errors
            ])->setStatusCode($status);
        }
    }
