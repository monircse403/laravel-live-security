<?php

namespace monircse403\LiveSecurity\Middleware;

use Closure;
use YourName\LiveSecurity\Models\SecurityEvent;

class TrackActivity
{
    public function handle($request, Closure $next)
    {
        SecurityEvent::create([
            'ip' => $request->ip(),
            'path' => $request->path(),
            'user_agent' => $request->userAgent()
        ]);

        return $next($request);
    }
}
