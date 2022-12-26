@extends('layouts._models._dashboard')

@section('navigation')
    <nav class="relative bg-slate-50 dark:bg-white/10 py-6 rounded-lg px-8">
        <ul>
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                @php($label = __('Articles'))
                <i class="fa-solid fa-pen-nib text-sm"></i>
                @if(request()->routeIs('posts.index'))
                    <span class="font-medium underline decoration-orange-500 underline-offset-4">{{$label}}</span>
                @else
                    <a href="{{route('posts.index')}}">{{$label}}</a>
                @endif
            </li>
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                <i class="fa-regular fa-folder-open text-sm"></i>
                <a href="#" class="">{{__('Categories')}}</a>
            </li>
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                <i class="fa-solid fa-tags text-sm"></i>
                <a href="#" class="">{{__('Tags')}}</a>
            </li>
        </ul>
    </nav>
@endsection
