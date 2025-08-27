<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Jika guard admin, redirect ke route admin.login
        if ($request->is('admin') || $request->is('admin/*')) {
            return route('admin.login');
        }
        // Default: bisa return null atau redirect ke halaman lain jika diperlukan
        return null;
    }
}
