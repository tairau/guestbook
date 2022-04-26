<?php

use App\Models\User;
use App\API\Auth\LoginAction;
use App\API\Auth\RegisterAction;

use App\Services\Auth\RegisterNewUser;

use function Pest\Laravel\postJson;
use function Pest\Laravel\assertDatabaseHas;

dataset(
    'emails',
    collect()->times(3, function () {
        return faker()->safeEmail();
    })
);

it('register new user', function ($email) {
    postJson(action(RegisterAction::class), [
        'email'                 => $email,
        'password'              => 'password',
        'password_confirmation' => 'password',
    ])->assertOk();

    assertDatabaseHas((new User())->getTable(), [
        'email' => $email,
    ]);
})->with('emails');

it('login user', function ($email) {
    $register = new RegisterNewUser();
    $register->register([
        'email'    => $email,
        'password' => $password = 'password',
    ]);

    postJson(action(LoginAction::class), [
        'email'    => $email,
        'password' => $password,
    ])->assertOk();
})->with('emails');
