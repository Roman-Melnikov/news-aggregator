<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Laravel\Socialite\Contracts\User;

interface ISocial
{
    public function loginAndRedirectUrl(User $user): string;
}
