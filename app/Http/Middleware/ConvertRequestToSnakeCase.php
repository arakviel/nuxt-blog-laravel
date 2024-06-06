<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class ConvertRequestToSnakeCase
{
    public function handle($request, Closure $next)
    {
        $request->replace($this->arrayKeysToSnakeCase($request->all()));
        return $next($request);
    }

    private function arrayKeysToSnakeCase(array $array)
    {
        $snakeCasedArray = [];
        foreach ($array as $key => $value) {
            $newKey = Str::snake($key);
            $snakeCasedArray[$newKey] = is_array($value) ? $this->arrayKeysToSnakeCase($value) : $value;
        }
        return $snakeCasedArray;
    }
}
