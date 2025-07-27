<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $apiKey;
    protected $baseUrl;



    /**
     * Generate documentation using OpenAI API.
     * @param string $code
     * @param string $language
     * @return string|null
     */
    public function generateDocumentation($code, $lang = 'ar')
    {
        // إرسال الكود واللغة إلى API المحلي FastAPI واستقبال التوثيق
        $response = Http::timeout(120)->post('http://127.0.0.1:8000/generate-doc', [
            'code' => $code,
            'lang' => $lang,
        ]);
        if ($response->successful() && isset($response['documentation'])) {
            return $response['documentation'];
        }
        return $lang === 'ar' ? 'لم يتم توليد التوثيق. تأكد من تشغيل خدمة الذكاء الاصطناعي.' : 'Documentation was not generated. Please make sure the AI service is running.';
    }
}