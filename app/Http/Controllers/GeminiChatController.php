<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiChatController extends Controller
{
    public function generateContent(Request $request)
    {
        if (!env('GEMINI_API_KEY')) {
            Log::error('GEMINI_API_KEY is not set in the .env file.');
            return response()->json(['reply' => 'Maaf, layanan Chatbot tidak dikonfigurasi dengan benar (API Key hilang).'], 500);
        }
        $userMessage = $request->input('message');
        $chatHistory = $request->input('history', []);
        $systemInstructionText = "PERINTAH TEGAS: Anda adalah 'Gayatri AI', asisten AI resmi Polres Tulungagung. Peran Anda HANYA menjawab pertanyaan seputar kepolisian, layanan Polres Tulungagung (SKCK, SIM, aduan, dll), dan informasi terkait. JANGAN PERNAH menjawab pertanyaan di luar topik ini (misal: resep, cuaca, politik, sejarah, koding, dll).
ATURAN RESPON:
1.  Jika pertanyaan relevan dengan topik kepolisian/Polres Tulungagung: Jawab dengan ramah, profesional, dan informatif dalam Bahasa Indonesia.
2.  Jika pertanyaan TIDAK relevAN (di luar topik): Jawab HANYA dengan kalimat ini dan tidak boleh ada tambahan lain: 'Mohon maaf, pertanyaan Anda di luar lingkup layanan kami. Silakan hubungi nomor darurat polisi 101 untuk bantuan lebih lanjut.'
Ini adalah aturan mutlak. Jangan melanggar.";
        // --- AKHIR MODIFIKASI INSTRUKSI ---

        // --- LOGIKA PEMBUATAN 'CONTENTS' DIPERBARUI ---
        // Kita "mem-priming" model dengan instruksi sistem SETIAP SAAT.

        // 1. Mulai dengan instruksi sistem (sebagai 'user' pertama) dan jawaban 'model'
        // Ini memberitahu AI perannya SEBELUM melihat pertanyaan user.
        $primingMessages = [
            [
                'role' => 'user',
                'parts' => [['text' => $systemInstructionText]]
            ],
            [
                'role' => 'model',
                'parts' => [['text' => 'Saya mengerti. Saya adalah Gayatri AI dan hanya akan menjawab pertanyaan seputar Polres Tulungagung.']]
            ]
        ];

        // 2. Ambil riwayat chat yang sudah ada dari frontend
        $historyMessages = collect($chatHistory)->map(function ($message) {
            return [
                'role' => $message['role'],
                'parts' => [['text' => $message['text']]]
            ];
        })->toArray();

        // 3. Tambahkan pesan user yang baru
        $newUserMessage = [
            'role' => 'user',
            'parts' => [['text' => $userMessage]]
        ];

        // 4. Gabungkan semuanya: Instruksi -> Riwayat -> Pesan Baru
        $contents = array_merge(
            $primingMessages, // Selalu mulai dengan instruksi
            $historyMessages, // Lalu tambahkan riwayat
            [$newUserMessage]  // Terakhir, tambahkan pesan baru
        );
        // --- AKHIR PERUBAHAN LOGIKA 'CONTENTS' ---


        try {
            $response = Http::timeout(30)->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . env('GEMINI_API_KEY'), [
                'contents' => $contents,

                'generationConfig' => [
                    'temperature' => 0.7, // Dibuat sedikit lebih kaku
                ],
            ]);

            if ($response->successful()) {
                $text = $response->json('candidates.0.content.parts.0.text', 'Terjadi kesalahan saat memproses jawaban dari AI.');
                return response()->json(['reply' => $text]);
            }

            Log::error('Gemini API Call Failed', ['status' => $response->status(), 'body' => $response->body()]);
            return response()->json(['reply' => 'Maaf, terjadi kesalahan pada layanan AI. Status: ' . $response->status()], 500);

        } catch (\Exception $e) {
            Log::error('Chat Request Exception: ' . $e->getMessage());
            return response()->json(['reply' => 'Maaf, layanan chat sedang tidak tersedia karena masalah server.'], 500);
        }
    }
}
