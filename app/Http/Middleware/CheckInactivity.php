<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckInactivity
{
  /**
   * Handle an incoming request.
   *
   * Auto logout user after 2 hours of inactivity
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (Auth::check()) {
      $timeout = config('session.lifetime') * 60; // Convert minutes to seconds
      $lastActivity = session('last_activity_time');

      if ($lastActivity && (time() - $lastActivity) > $timeout) {
        // User has been inactive for too long
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
          ->with('error', 'Sesi Anda telah berakhir karena tidak aktif selama ' . config('session.lifetime') . ' menit. Silakan login kembali.');
      }

      // Update last activity time
      session(['last_activity_time' => time()]);
    }

    return $next($request);
  }
}
