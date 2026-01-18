<?php

return [
    'telegram' => [
        'token' => app_env('TELEGRAM_TOKEN'),
        'chat_id' => app_env('TELEGRAM_CHAT_ID'),
    ],

    'slack' => [
        'token' => app_env('SLACK_TOKEN'),
        'channel' => app_env('SLACK_CHANNEL'),
        'webhook_url' => app_env('SLACK_WEBHOOK_URL'),
    ],

    'twilio' => [
        'account_sid' => app_env('TWILIO_ACCOUNT_SID'),
        'auth_token' => app_env('TWILIO_AUTH_TOKEN'),
        'from' => app_env('TWILIO_FROM'),
    ],
];
