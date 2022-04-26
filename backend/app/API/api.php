<?php

use App\API\Auth\MeAction;
use App\API\Auth\LoginAction;
use App\API\Auth\RegisterAction;
use Illuminate\Support\Facades\Route;
use App\API\Messages\AddAnswerAction;
use App\API\Docs\DocumentationAction;
use App\API\Messages\AddMessageAction;
use App\API\Shared\Middleware\HasAdminRole;
use App\API\Messages\PaginatedMessagesAction;

Route::get('', DocumentationAction::class);

Route::prefix('auth')->group(function () {
    Route::post('register', RegisterAction::class);
    Route::post('login', LoginAction::class);
    Route::get('me', MeAction::class)->middleware(['auth:api']);
});

Route::middleware(['auth:api'])->prefix('messages')->group(function () {
    Route::get('', PaginatedMessagesAction::class);
    Route::post('', AddMessageAction::class);
    Route::prefix('{id}')->where(['id' => '[0-9]+'])->group(function () {
        Route::post('', AddAnswerAction::class)
            ->middleware(HasAdminRole::class);
    });
});
