@extends('layouts.dashboard')
@section('content')
    <h1 class="text-2xl font-semibold mb-12">Console</h1>

    <?php

        $post = \App\Services\PostService::getPost(6032);
        $text = $post->content->rendered;
//        dump($text);
        $pattern = '/\bhttps?:\/\/\S+?\/[^\/]+\.(png|jpe?g)(?<![^\d]\d{3}x\d{3}|^[^\d]\d{3}x\d{3}|-[^\d]\d{3}x\d{3}|^[^\d]-\d{3}x\d{3}|\d{2}x\d{2}|-\d{2}x\d{2}|\d{1}x\d{1}|-\d{1}x\d{1})\b/';

        if (preg_match_all($pattern, $text, $matches)) {
            // La regex ha trovato una o più corrispondenze
//            dump($matches);
            $urls = array_unique($matches[0]);
            foreach ($urls as $url) {

                if (!preg_match("/\d+x\d+\./", $url)) {
                    dump($url);
                }
            }
//            usort($urls, fn(string $a, string $b) => strlen($a) > strlen($b)) ? 1 : -1;
//            dump($urls[0]);
        }
    ?>

@endsection
