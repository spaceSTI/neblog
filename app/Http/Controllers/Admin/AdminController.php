<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Super class for all controllers of admin zone
 */
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        /** @var User $user */
        $user = Auth::user();
        if (!$user || config('auth.admin_user') !== $user->name) {
            return;
        }
    }
}
