<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiChatController extends Controller
{
    /**
     * Mengambil teks system instruction dari file eksternal.
     * Ini memudahkan pengeditan tanpa harus menyentuh logika controller.
     */
    private function getSystemInstruction(): string
    {
        $path = resource_path('ai/gayatri_knowledge.txt');

        if (file_exists($path)) {
            return file_get_contents($path);
        }

        // Fallback jika file tidak ditemukan
        return "Anda adalah Gayatri AI, asisten Polres Tulungagung. Jawab hanya pertanyaan terkait kepolisian.";
    }

    public function generateContent(Request $request)
    {
        $apiKey = config('services.gemini.api_key');
        if (!$apiKey) {
            Log::error('GEMINI_API_KEY is not set in the .env file.');
            return response()->json([
                'reply' => 'Maaf, layanan Chatbot tidak dikonfigurasi dengan benar (API Key hilang).'
            ], 500);
        }

        $userMessage   = $request->input('message');
        $chatHistory   = $request->input('history', []);
        $systemText    = $this->getSystemInstruction();

        // Priming: system instruction disuntikkan sebagai giliran pertama
        $primingMessages = [
            [
                'role'  => 'user',
                'parts' => [['text' => $systemText]],
            ],
            [
                'role'  => 'model',
                'parts' => [['text' => 'Saya mengerti. Saya adalah GAYATRI AI, asisten resmi Polres Tulungagung. Saya siap membantu dengan informasi lengkap seputar layanan dan prosedur kepolisian.']],
            ],
        ];

        $historyMessages = collect($chatHistory)->map(fn($m) => [
            'role'  => $m['role'],
            'parts' => [['text' => $m['text']]],
        ])->toArray();

        $newUserMessage = [
            'role'  => 'user',
            'parts' => [['text' => $userMessage]],
        ];

        $contents = array_merge($primingMessages, $historyMessages, [$newUserMessage]);

        try {
            $response = Http::timeout(30)->post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-lite:generateContent?key=' . $apiKey,
                [
                    'contents'         => $contents,
                    'generationConfig' => [
                        'temperature'     => 0.4, // Lebih rendah = lebih konsisten & faktual
                        'maxOutputTokens' => 2048,
                    ],
                ]
            );

            if ($response->successful()) {
                $text = $response->json(
                    'candidates.0.content.parts.0.text',
                    'Terjadi kesalahan saat memproses jawaban dari AI.'
                );
                return response()->json(['reply' => $text]);
            }

            Log::error('Gemini API Call Failed', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
            return response()->json([
                'reply' => 'Maaf, terjadi kesalahan pada layanan AI. Status: ' . $response->status()
            ], 500);
        } catch (\Exception $e) {
            Log::error('Chat Request Exception: ' . $e->getMessage());
            return response()->json([
                'reply' => 'Maaf, layanan chat sedang tidak tersedia karena masalah server.'
            ], 500);
        }
    }
}
