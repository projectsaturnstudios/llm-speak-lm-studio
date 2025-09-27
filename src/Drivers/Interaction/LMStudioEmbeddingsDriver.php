<?php

namespace LLMSpeak\LMStudio\Drivers\Interaction;

use LLMSpeak\Core\NeuralModels\EmbeddingsModel;
use LLMSpeak\Core\DTO\Primitives\VectorEmbedding;
use LLMSpeak\Core\Drivers\Interaction\ModelEmbeddingsDriver;

class LMStudioEmbeddingsDriver extends ModelEmbeddingsDriver
{
    protected string $driver_name = 'lm-studio';

     /**
     * @param array<string> $input
     * @param EmbeddingsModel $neural_model
     * @return array
     */
    protected function generateRequestBody(array $input, EmbeddingsModel $neural_model): array
    {
        return array_map(fn(string $text) => [
            'input' => $text,
            'model' => $neural_model->modelId(),
        ], $input);
    }

    protected function generateEmbeddings(array $output): array
    {
        $results = [
            'usage' => $output['usage'],
            'vectorized' => array_map(fn(array $embedding_data) =>
            (new VectorEmbedding(
                $embedding_data['embedding'],
                ['index' => $embedding_data['index'], 'object' => $embedding_data['object']]
            )),
                $output['data']
            )
        ];

        return array_values($results);
    }
}
