<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenAI\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/', function (Request $request) {
    $output = '';
    if ($request->get('input')) {
        $input = $request->get('input');

        $response = app(Client::class)->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $input],
            ],
        ])->toArray();

        $output = $response['choices'][0]['message']['content'];
        $output = nl2br($output);
    }
    return view('welcome', compact('output'));
});
