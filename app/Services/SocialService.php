<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\ISocial;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements ISocial
{

    /**
     * @throws \Exception
     */
    public function loginAndRedirectUrl(SocialUser $socialUser): string
    {

        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();

        if ($user === null) {
            return \route('auth.register');
        }

        $user->name = $socialUser->getName();
        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);
            return \route('account.home');
        }

        throw new \Exception('did not save user');
    }
}
