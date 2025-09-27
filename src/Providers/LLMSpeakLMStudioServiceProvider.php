<?php

namespace LLMSpeak\LMStudio\Providers;

use LLMSpeak\Core\Support\Facades\AICompletions;
use LLMSpeak\Core\Support\Facades\AIEmbeddings;
use LLMSpeak\Core\Support\Facades\AIInference;
use LLMSpeak\LMStudio\Drivers\Interaction\LMStudioCompletionsDriver;
use LLMSpeak\LMStudio\Drivers\Interaction\LMStudioEmbeddingsDriver;
use LLMSpeak\LMStudio\Drivers\Interaction\LMStudioInferenceDriver;
use ProjectSaturnStudios\LaravelDesignPatterns\Providers\BaseServiceProvider;

class LLMSpeakLMStudioServiceProvider extends BaseServiceProvider
{
    protected array $config = [
        'vector-embeddings.drivers.lm-studio' => __DIR__ . '/../../config/embeddings/drivers/lm-studio.php',
        'inferencing.drivers.lm-studio' => __DIR__ . '/../../config/inference/drivers/lm-studio.php',
        'chat-completions.drivers.lm-studio' => __DIR__ . '/../../config/chat/drivers/lm-studio.php',
    ];
    protected array $publishable_config = [
        [
            'key' => 'vector-embeddings.drivers.lm-studio',
            'file_path' => __DIR__ . '/../../config/embeddings/drivers/lm-studio.php',
            'groups' => ['llms', 'llms.ve', 'llms.ve.lm-studio']
        ],
        [
            'key' => 'inferencing.drivers.lm-studio',
            'file_path' => 'inferencing/drivers/lm-studio.php',
            'groups' => ['llms', 'llms.mi', 'llms.mi.lm-studio']
        ],
        [
            'key' => 'chat-completions.drivers.lm-studio',
            'file_path' => 'chat-completions/drivers/lm-studio.php',
            'groups' => ['llms', 'llms.cc', 'llms.cc.lm-studio']
        ]
    ];

    protected function mainBooted(): void
    {
        AIEmbeddings::extend('lm-studio', fn() => new LMStudioEmbeddingsDriver());
        AIInference::extend('lm-studio', fn() => new LMStudioInferenceDriver());
        AICompletions::extend('lm-studio', fn() => new LMStudioCompletionsDriver());
    }

}
