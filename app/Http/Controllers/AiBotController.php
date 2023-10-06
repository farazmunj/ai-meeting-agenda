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
        $input = $request->get('p', 'PHP is');
        $result = $this->client->completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => $input,
        ]);
        return $result['choices'][0]['text'];
    }
}
