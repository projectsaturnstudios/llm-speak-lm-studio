<?php

return [
    'driver_class' => \LLMSpeak\LMStudio\Drivers\Interaction\LMStudioCompletionsDriver::class,
    'config' => [
        'endpoint_uri' => env('LMS_INFERENCE_URI', '/v0/chat/completions'),
        'api_key' => env('LMS_API_KEY', null),
    ]
];
