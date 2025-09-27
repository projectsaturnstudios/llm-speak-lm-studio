<?php

return [
    'driver_class' => \LLMSpeak\LMStudio\Drivers\Interaction\LMStudioInferenceDriver::class,
    'config' => [
        'endpoint_uri' => env('LMS_INFERENCE_URI', '/v0/completions'),
        'api_key' => env('LMS_API_KEY', null),
    ]
];
