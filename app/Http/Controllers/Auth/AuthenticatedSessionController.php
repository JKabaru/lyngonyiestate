<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Assuming $request->user() returns the authenticated user instance
        $user = $request->user();

        $url = '';
        // $roleNames = $user->roles->pluck('roleName')->toArray();
        // Check if the user's role name is "admin"
        // $user->role->roleName === 'admin'
        if ($user->role === 'admin') {
            $url = "admin/dashboard";
        } 
        else
        {
            $url = "/dashboard";
        }

        $notification = array(
            'message' => 'Logged in Successfully ',
            'alert-type' => 'info'
        );
        

        return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
