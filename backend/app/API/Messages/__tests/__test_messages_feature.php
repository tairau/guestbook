<?php

use App\Models\User;

use App\Models\Message;
use App\API\Messages\AddAnswerAction;
use App\API\Messages\AddMessageAction;

use App\API\Messages\PaginatedMessagesAction;

use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('add message and answer for it, receive paginated', function () {
    $user = User::factory()->create();
    actingAs($user);

    $response = postJson(action(AddMessageAction::class), [
        'text' => faker()->realText(),
    ])->assertOk();

    $messageId = $response->json('data.id');
    assertDatabaseHas((new Message())->getTable(), [
        'id' => $messageId,
    ]);

    $admin = User::factory()->admin()->create();
    actingAs($admin);

    postJson(action(AddAnswerAction::class, $messageId), [
        'text' => faker()->realText(),
    ])->assertOk();

    getJson(action(PaginatedMessagesAction::class))
        ->assertOk();
});
