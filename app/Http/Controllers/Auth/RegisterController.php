<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\TagService;

class RegisterController extends Controller
{
    private TagService $tagService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TagService $tagService)
    {
        $this->middleware('guest');
        $this->tagService = $tagService;
    }

    public function showRegisterForm()
    {
        return view('auth.register',
            [
                'tagsWithWeights' => $this->tagService->getTagsWithWeight(),
            ]);
    }

    protected function userCreate(Request $data)
    {
        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        session()->flash('success', 'Регистрация прошла успешно!');
        Auth::login($user);
        return redirect()->route('site-index');
    }
}
