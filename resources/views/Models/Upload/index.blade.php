@extends('dashboard')
@section('content')
    <div x-data="{showAddModal: false}">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-semibold">
                    {{__('Media')}}
                </h1>
                <p class="text-xs uppercase opacity-60">{{$uploads->total()}} {{__('media to show')}}</p>
            </div>
            <a href="{{route('uploads.create')}}" class="btn-primary" @click.prevent="showAddModal=true">{{__('Add')}}</a>
        </div>

        <section id="add-new-media" class="fixed top-0 left-0 w-screen cursor-pointer h-screen bg-white/10 backdrop-blur-sm z-50" x-show="showAddModal" x-transition.opacity.duration.500ms @click="showAddModal = false">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 min-w-[50%] bg-white dark:bg-gray-700 rounded-lg shadow-xl p-6" @click.stop>
                <form action="{{route('uploads.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-2xl font-semibold">
                        {{__('Add media file')}}
                    </h2>
                    <div class="mb-4">
                        <label class="uppercase font-bold text-xs" for="file">{{__('File to upload')}}</label>
                        <input type="file" accept="image/png, image/jpeg" class="w-full bg-transparent outline-0" id="file" name="file" value="{{old('file')}}">
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
        @if($uploads->isNotEmpty())
            <div class="grid grid-cols-8 gap-8">
                @foreach($uploads->items() as $upload)
                    <form action="{{route('uploads.destroy', $upload)}}" method="POST" @submit.prevent="if(confirm('Stai per eliminare il file: sei certo di continuare?')) $el.submit()">
                        @csrf
                        @method('DELETE')
                        <div class="aspect-square overflow-hidden relative">
                            <input type="submit" class="absolute top-0 left-0 right-0 bottom-0 bg-blue-900/50 cursor-pointer backdrop-blur-sm opacity-0 duration-300 hover:opacity-100" value="Elimina">
                            <img src="{{$upload->url}}" alt="{{$upload->alt}}" class="object-cover h-full w-auto">
                        </div>
                    </form>
                @endforeach
            </div>
        @else
            <div>
                <p>Non ci sono elementi da visualizzare.</p>
            </div>
        @endif
    </div>
@endsection
