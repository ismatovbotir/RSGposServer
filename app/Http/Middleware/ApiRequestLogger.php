<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiRequestLog;

class ApiRequestLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $startTime = microtime(true);
        //dd($request->path());
        try{
            $apiReqLog= ApiRequestLog::create([
                'method'      => $request->method(),
                'endpoint'    => $request->path(),
                'ip'          => $request->ip(),
                'status'      => 0,
                'duration_ms' => 0,
                'payload'     => $request->except(['token', 'password']),
            ]);
        }catch(\Exception $e){

        }
        
        // Run controller + next middleware
        $response = $next($request);

        // Calculate duration AFTER controller
        $durationMs = (int) ((microtime(true) - $startTime) * 1000);

        // Save log safely
        try{
            $apiReqLog->update([
                'status'      => $response->status(),
                'duration_ms' => $durationMs
            ]);
        }catch(\Exception $e){

        }
       

        return $response;
        
        
        //
    }
}
