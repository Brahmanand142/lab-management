<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GeminiController extends Controller
{
   public function handlePrompt(Request $request)
    {
        
        $text = $request->input('text');

        $client = new Client();

        $res = $client->post(
            'https://generativelanguage.googleapis.com/v1/models/gemini-1.5-flash:generateContent?key=' . env('GEMINI_API_KEY'),
            [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $text]
                            ]
                        ]
                    ]
                ]
            ]
        );

        $responseBody = json_decode($res->getBody(), true);
        dd($responseBody);
        $reply = $responseBody['candidates'][0]['content']['parts'][0]['text'] ?? 'No response received.';

        return response()->json(['reply' => $reply]);
    }
}
