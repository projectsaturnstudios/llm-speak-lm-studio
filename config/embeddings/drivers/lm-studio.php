<?php

return [
    'driver_class' => \LLMSpeak\LMStudio\Drivers\Interaction\LMStudioEmbeddingsDriver::class,
    'config' => [
        'endpoint_uri' => env('LMS_EMBED_URI', '/v0/embeddings'),
        'api_key' => env('LMS_API_KEY', null),
    ]
];
