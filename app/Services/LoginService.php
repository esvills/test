<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Client\Request;

class LoginService
{
    public function login(LoginRequest $request)
    {
        $phone = $request->get('phone');

        $user = User::where('phone', $phone)->first();

        if (is_null($user)) {
            $login = $request->get('login');

            $user = User::create([
                'login' => $login,
                'phone' => $phone,
            ]);
        }

        $link = LinkService::generate($user);

        return redirect()->route('link', $link->link);
    }
}
