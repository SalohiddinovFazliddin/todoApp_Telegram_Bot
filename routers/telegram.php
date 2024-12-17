<?php

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.telegram.org/bot' . $_ENV['TELEGRAM_BOT_TOKEN'] ."/"
]);

$client->post( 'sendMessage', [
    'form_params' => [
        'chat_id' => $chat_id,
        'text' => $text,
    ]
]);