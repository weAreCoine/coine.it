@extends('dashboard')
@section('content')
    <div class="text-right">
        <a href="" class="btn-primary">{{__('Create')}}</a>
    </div>
    <form action="">
        <ul>
            @foreach($posts as $post)
                <li class="grid grid-cols-12">
                    <div>
                        <input type="checkbox" name="post_{{$post->id}}">
                    </div>
                    <div class="col-span-4">
                        <a href="{{route('posts.edit', $post)}}">
                            {{$post->title}}
                        </a>
                    </div>
                    <div class="col-span-2">
                        {{$post->category->title}}
                    </div>
                    <div class="col-span-2">
                        {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d/m/Y')}}
                    </div>
                </li>
            @endforeach
        </ul>
    </form>

@endsection
