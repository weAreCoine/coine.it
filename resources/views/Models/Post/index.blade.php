@extends('dashboard')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                {{__('Articles')}}
            </h1>
            <p class="text-xs uppercase opacity-60">{{$posts->total()}} @choice('article|articles to show',$posts->total())</p>
        </div>
        @if(request('trashed', '0') === '1')
            <form action="{{route('posts.empty-trash')}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn-primary">{{__('Empty trash')}}</button>
            </form>
        @else
            <a href="{{route('posts.create')}}" class="btn-primary">{{__('Create')}}</a>
        @endif
    </div>
    <table class="admin-table">
        <thead>
        <tr>
            <th>
                <a href="{{$getOrderByLink('title')}}" class="style-none">
                    @if($order_by === 'title')
                        {!! $order !!}
                    @endif
                    {{__('Title')}}
                </a>
            </th>

            <th>{{__('Category')}}</th>
            <th>
                <a href="{{$getOrderByLink('created_at')}}" class="style-none">
                    @if($order_by === 'created_at')
                        {!! $order !!}
                    @endif
                    {{__('Date')}}
                </a>
            </th>
            <th>
                <a href="{{$getOrderByLink('status')}}" class="style-none">
                    @if($order_by === 'status')
                        {!! $order !!}
                    @endif
                    {{__('Status')}}
                </a>
            </th>

            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>
                    @if(request('trashed','0') === '1')
                        {{$post->title}}
                    @else
                        <a href="{{route('posts.edit', $post)}}" class="style-none">
                            {{$post->title}}
                        </a>
                    @endif
                </td>
                <td>
                    {{$post->category->title??''}}
                </td>
                <td>
                    {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->format('d/m/Y')}}
                </td>
                <td>
                    {{ucfirst(__($post->status))}}
                </td>

                <td class="flex justify-end items-center gap-8">
                    @if(request('trashed','0') === '1')
                        <form action="{{route('posts.revive', $post)}}" method="POST" class="m-0">
                            @csrf
                            <button title="{{__('Restore article')}}" type="submit" class="block cursor-pointer hover:text-red-500 dark:hover:text-red-400 duration-300">
                                <i class="fa-solid fa-recycle"></i>
                            </button>
                        </form>

                    @else
                        <a title="{{__('Edit post')}}" href="{{route('posts.edit', $post)}}" class="style-none block hover:text-sky-500 dark:hover:text-sky-400 duration-300">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    @endif
                    <form action="{{route('posts.destroy', $post)}}" method="POST" class="m-0">
                        @method('DELETE')
                        @csrf
                        <button title="{{request('trashed','0') === '1'? __('Permanently deletes') : __('Move to trash')}}" type="submit" class="block cursor-pointer hover:text-red-500 dark:hover:text-red-400 duration-300">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="flex justify-between items-center mt-8">
        <div>
            @if(request('trashed', '0') === '0')
                <a href="{{route('posts.index', ['trashed' => '1'])}}" class="btn-secondary text-xs">{{__('Show trashed')}}</a>
            @else
                <a href="{{route('posts.index', ['trashed' => '0'])}}" class="btn-secondary text-xs">{{__('Hide trashed')}}</a>
            @endif
        </div>
        <div class="flex justify-end items-center gap-4 text-xs uppercase ">
            @component('components.pagination', ['paginator' => $posts])
            @endcomponent
        </div>
    </div>
@endsection
