<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check() && !empty(Auth::guard('admin')->user()->role_id) && Auth::guard('admin')->user()->status == 0) {
            Auth::guard('admin')->logout();
            
            $notification = array(
                'messege' => 'Your account has been banned by Admin!',
                'alert' => 'warning'
            );
            return redirect(route('admin.login'))->with('notification', $notification);
          }
        return $next($request);
    }
}
