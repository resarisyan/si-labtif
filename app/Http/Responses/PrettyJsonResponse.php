<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class PrettyJsonResponse extends JsonResponse
{
    public function __construct(
        mixed $data = null,
        int $status = 200,
        array $headers = [],
        int $options = 0,
        bool $json = false
    ) {
        $options |= JSON_PRETTY_PRINT;
        parent::__construct($data, $status, $headers, $options, $json);
    }
}
