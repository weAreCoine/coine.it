@extends('dashboard')
@section('content')
    <form action="{{route('posts.update', $post)}}" method="POST" class="admin-form">
        @csrf
        <div class="flex justify-between items-center gap-16">
            <h1 class="text-2xl font-semibold">
                {{__('Edit article')}}
            </h1>

            <button type="submit" class="rounded-full btn-primary">
                {{__('Save')}}
            </button>
        </div>
        <div class="mt-8">
            <div class="mb-4">
                <label for="title">{{__('Title')}}</label>
                <input type="text" id="title" name="title" class="text-2xl" placeholder=" " value="{{old('title', $post->title)}}">
            </div>
            <div class="mb-4">
                <label for="slug">{{__('Slug')}}</label>
                <input type="text" id="slug" name="slug" placeholder=" " value="{{old('slug', $post->slug)}}">
            </div>
        </div>
        <div id="content">

        </div>
    </form>
@endsection
