<?php

namespace App\Http;

use App\Models\Image;
use App\Models\MainPage;
use App\Models\SubPage;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    /**
     * @param  string $url
     * @return Response
     */
    public function fetch(string $url) : Response
    {
        return Http::withHeaders([
            'User-Agent' => $this->randomUserAgent(),
        ])
            ->retry(3, 1000)
            ->get($url);
    }

    /**
     * Random user agents, generated by https://user-agents.net/random
     *
     * @link https://user-agents.net/random
     * @return string
     */
    private function randomUserAgent() : string
    {
        return array_rand([
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 RuxitSynthetic/1.0 v3602278526264994744 t8930893844320375173 ath1fb31b7a altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 RuxitSynthetic/1.0 v8190359887821985895 t712916825526680332 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 RuxitSynthetic/1.0 v49016329320673130 t1376908986496905257 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36 RuxitSynthetic/1.0 v11222822599 t6211589819942727045 athfa3c3975 altpub cvcv=2 smf=0',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 RuxitSynthetic/1.0 v4613031362115437925 t2865879635610225063 ath1fb31b7a altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 RuxitSynthetic/1.0 v2850981682573255003 t2446226520816138061 ath2653ab72 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 RuxitSynthetic/1.0 v2878504760310142022 t2867360494966757067 ath1fb31b7a altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36 RuxitSynthetic/1.0 v7314017839704787664 t7368097960050991226 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36 RuxitSynthetic/1.0 v11222902226 t6211589819942727045 athfa3c3975 altpub cvcv=2 smf=0',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36 RuxitSynthetic/1.0 v875840250853514955 t8930893844320375173 ath1fb31b7a altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36 RuxitSynthetic/1.0 v5381520021113399343 t5793447517061175561 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 RuxitSynthetic/1.0 v7667530872910326771 t864943891485976687 athe94ac249 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36 RuxitSynthetic/1.0 v931695472877760219 t712916825526680332 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 RuxitSynthetic/1.0 v16918106806629199 t1730774511221897603 ath4b3726d5 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.72 Safari/537.36 RuxitSynthetic/1.0 v7501884753327324754 t1376908986496905257 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36 RuxitSynthetic/1.0 v7119309690781381541 t8737467105677571483 athe94ac249 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 RuxitSynthetic/1.0 v8855673398038008989 t878706690683009423 ath2653ab72 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36 RuxitSynthetic/1.0 v8031259323509640126 t7368097960050991226 ath5ee645e0 altpriv cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36 RuxitSynthetic/1.0 v11223039673 t6211589819942727045 athfa3c3975 altpub cvcv=2 smf=0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36 RuxitSynthetic/1.0 v8790772125440012971 t2550136649093328086 athe94ac249 altpriv cvcv=2 smf=0',
        ]);
    }
}