<?php
    namespace App\Http\Responses;

    use Illuminate\Http\JsonResponse;

    class ApiResponse {
        public static function successResponse(mixed $data, string $message, int $status = 200): JsonResponse
        {
            return response()->json([
                "success" => true,
                "data" => $data,
                "message" => $message
            ]
            )->setStatusCode($status);
        }

        public static function errorResponse(string $message, int $status = 400, mixed $errors = []): JsonResponse
        {
            return response()->json([
                "success" => false,
                'message' => $message,
                'errors' => $errors
            ])->setStatusCode($status);
        }

        public static function paginateResponse($data, $paginate): JsonResponse
        {
            list($currentPage, $perPage, $totalData) = $paginate;

            return response()->json([
                'data' => $data,
                'current_page' => $currentPage,
                'per_page' => $perPage,
                'total' => $totalData
            ]);
        }
    }
