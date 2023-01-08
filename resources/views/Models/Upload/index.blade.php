@extends('dashboard')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-semibold">
                {{__('Media')}}
            </h1>
            <p class="text-xs uppercase opacity-60">{{$uploads->total()}} {{__('media to show')}}</p>
        </div>
        <a href="{{route('uploads.create')}}" class="btn-primary">{{__('Add')}}</a>
    </div>

    <section id="add-new-media" class="fixed top-0 left-0 w-screen h-screen bg-white/10 backdrop-blur-sm z-50">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 min-w-[50%] bg-white rounded-lg shadow-xl p-6">
            <form action="{{route('uploads.create')}}" method="get">
                <h2 class="text-2xl font-semibold">
                    {{__('Add media file')}}
                </h2>
                <div class="mb-4">
                    <label class="uppercase font-bold text-xs" for="file">{{__('File to upload')}}</label>
                    <input type="file" accept="image/png, image/jpeg" class="w-full bg-transparent outline-0" id="file" name="file" placeholder=" " value="{{old('name')}}">
                </div>
                <div class="mb-4">
                    <label class="uppercase font-bold text-xs" for="name">{{__('Name')}}</label>
                    <input type="text" class="w-full bg-transparent outline-0" id="name" name="name" placeholder=" " value="{{old('name')}}">
                </div>
                <div class="mb-4">
                    <label class="uppercase font-bold text-xs" for="slug">{{__('Slug')}}</label>
                    <input type="text" class="w-full bg-transparent outline-0" id="slug" name="slug" placeholder=" " value="{{old('slug')}}">
                </div>
                <div class="mb-4">
                    <label class="uppercase font-bold text-xs" for="title">{{__('Title')}}</label>
                    <input type="text" class="w-full bg-transparent outline-0" id="title" name="title" placeholder=" " value="{{old('title')}}">
                </div>
                <div class="mb-4">
                    <label class="uppercase font-bold text-xs" for="alt">{{__('Alternative text')}}</label>
                    <input type="text" class="w-full bg-transparent outline-0" id="alt" name="alt" placeholder=" " value="{{old('alt')}}">
                </div>
                <div class="mb-4">
                    <label class="uppercase font-bold text-xs" for="description">{{__('Description')}}</label>
                    <input type="text" class="w-full bg-transparent outline-0" id="description" name="description" placeholder=" " value="{{old('description')}}">
                </div>
                <button type="submit" class="btn-primary">{{__('Add new media')}}</button>

            </form>
        </div>
    </section>
@endsection
