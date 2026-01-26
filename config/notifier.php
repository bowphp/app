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

    'sms' => [
        'provider' => app_env('SMS_PROVIDER', 'callisto'), // Default SMS provider

        'twilio' => [
            'account_sid' => app_env('TWILIO_ACCOUNT_SID'),
            'auth_token' => app_env('TWILIO_AUTH_TOKEN'),
            'from' => app_env('TWILIO_FROM'),
        ],

        'callisto' => [
            'access_key' => app_env('CALLISTO_ACCESS_KEY'),
            'access_secret' => app_env('CALLISTO_ACCESS_SECRET'),
            'notify_url' => app_env('CALLISTO_NOTIFY_URL'),
            'sender' => app_env('CALLISTO_SENDER'),
        ],
    ],
];
