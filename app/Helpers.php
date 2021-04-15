<?php

declare(strict_types=1);

namespace App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Helpers
{
    public static function isAdmin(): bool
    {
        /** @var User $user */
        $user = Auth::user();
        return $user && config('auth.admin_user') === $user->name;
    }
}
