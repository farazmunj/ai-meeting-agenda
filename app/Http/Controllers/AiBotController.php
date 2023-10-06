<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Client;

class AiBotController extends Controller
{
    //
    public function __construct(private Client $client)
    {
    }

    public function __invoke(Request $request)
    {
        $transcript = $request->get('transcript', 'PHP is');
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that summarizes text.'],
                ['role' => 'user', 'content' => $transcript],
            ],

        ]);
        return $response->toArray();
        // $response->id; // 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq'
        // $response->object; // 'chat.completion'
        // $response->created; // 1677701073
        // $response->model; // 'gpt-3.5-turbo-0301'

        // foreach ($response->choices as $result) {
        //     $result->index; // 0
        //     $result->message->role; // 'assistant'
        //     $result->message->content; // '\n\nHello there! How can I assist you today?'
        //     $result->finishReason; // 'stop'
        // }

        // $response->usage->promptTokens; // 9,
        // $response->usage->completionTokens; // 12,
        // $response->usage->totalTokens; // 21

        // $response->toArray(); // ['id' => 'chatcmpl-6pMyfj1HF4QXnfvjtfzvufZSQq6Eq', ...]
    }
}
