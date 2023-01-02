@extends('layouts.page')
@section('content')
    <div class="container pt-12">
        <h1 id="page-title" class="text-7xl font-semibold">{{__('We craft holistic, people friendly digital experiences')}}</h1>
        <p class="text-4xl mt-12">{{__('BB Agency is a strategic partner for fast-growing tech companies in need of a scalable website with modular CMS, a design system, and future-proof brand identity.')}}</p>
        <div class="grid grid-cols-2 mt-24 gap-8">
            @foreach($posts as $post)
                <article id="post-{{$post->id}}" class="text-center">
                    <a href="{{route('posts.show', $post)}}" class="style-none">
                        <div class="h-12 bg-gray-100 w-full"></div>
                        <h2>{{ html_entity_decode($post->title)}}</h2>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
@endsection
