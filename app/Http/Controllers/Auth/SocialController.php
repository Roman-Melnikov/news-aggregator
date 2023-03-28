<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ISocial;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\Foundation\Application;

class SocialController extends Controller
{
    public function redirect(string $driver): SymfonyRedirectResponse|RedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, ISocial $social): Redirector|Application|RedirectResponse
    {
        return \redirect(
            $social->loginAndRedirectUrl(
                Socialite::driver($driver)->user()
            )
        );
    }
}
