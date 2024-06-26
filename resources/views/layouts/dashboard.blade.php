@extends('layouts._models._dashboard')

@section('navigation')
    <nav class="relative py-6 rounded-lg px-8">
        <ul>
            <li class="mb-16">
                @include('components.application-logo')
            </li>
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                @php($label = __('Articles'))
                <i class="fa-solid fa-pen-nib text-sm"></i>
                @if(request()->routeIs('posts.index'))
                    <span class="font-medium underline decoration-accent underline-offset-4">{{$label}}</span>
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
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                <i class="fa-solid fa-photo-film text-sm"></i>
                <a href="{{route('uploads.index')}}" class="">{{__('Media')}}</a>
            </li>
            <li class="mb-4 border-b border-b-darkBackground-300 dark:border-b-darkBackground-700"></li>
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                <i class="fa-solid fa-terminal text-sm"></i>
                <a href="{{route('console')}}" class="">{{__('Console')}}</a>
            </li>
            <li class="flex items-center gap-4 mb-4 last:mb-0">
                <i class="fa-solid fa-home text-sm"></i>
                <a href="{{route('home')}}" class="">{{__('Front page')}}</a>
            </li>
        </ul>
    </nav>
@endsection
