<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{recipientId}', function ($user, $recipientId) {
    return (int) $user->id === (int) $recipientId;
});
