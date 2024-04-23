<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        //cek sudah login atau  belum ,jika belum kembali ke halaman login
       

        if (!Auth::check()) {
            return redirect('login');
        }
        //
        $user = Auth::user();

        if ($user->level_id == $roles) {
            return $next($request);
        }

        return redirect('login')->with('error','Maaf anda tidak memiliki akses');
       
    }
}
