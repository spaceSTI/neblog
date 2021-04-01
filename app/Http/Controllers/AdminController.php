<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateProfile(Request $request)
    {
        if ($request->user()->id === 1) {
            // $request->user() returns an instance of the authenticated user...
        }
    }

    public function index()
    {
        $user = Auth::user();
        if (!$user || config('auth.admin_user') !== $user->name) {
            return;
        }
        return view('/admin');
    }
}
