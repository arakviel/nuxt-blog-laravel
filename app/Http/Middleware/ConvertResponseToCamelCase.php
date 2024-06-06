<?php

namespace App\Http\Middleware;

use Closure;
use DragonCode\Support\Facades\Helpers\Str;
use Illuminate\Http\JsonResponse;

class ConvertResponseToCamelCase
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof JsonResponse) {
            $data = $response->getData(true);
            $response->setData($this->arrayKeysToCamelCase($data));
        }

        return $response;
    }

    private function arrayKeysToCamelCase(array $array): array
    {
        $camelCasedArray = [];
        foreach ($array as $key => $value) {
            $newKey = Str::camel($key);
            $camelCasedArray[$newKey] = is_array($value) ? $this->arrayKeysToCamelCase($value) : $value;
        }
        return $camelCasedArray;
    }
}
