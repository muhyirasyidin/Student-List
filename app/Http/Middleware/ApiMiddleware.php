<?php
namespace App\Http\Middleware;

use Closure;

use App\User;
use App\ApiAccess;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$groups)
    {
        if ($request->application_token) {
            $access = ApiAccess::where('token', $request->application_token)->first();
            if ($access) {
                if ($request->user_token) {
                    $user = User::where('token', $request->user_token)->first();
                    if ($user) {
                        if ($user->authorizeGroups($groups)) {
                            return $next($request);
                        }
                        return response()->json(['message' => 'Unauthorized action'], 401);
                    }
                    return response()->json(['message' => 'Token missmatch'], 401);
                }
                return response()->json(['message' => 'Missing user token'], 401);
            }
            return response()->json(['message' => 'Unauthorized access'], 401);
        }
        return response()->json(['message' => 'Missing application token'], 401);
    }
}
