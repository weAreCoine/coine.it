@extends('dashboard')
@section('headScripts')
    <script src="https://cdn.tiny.cloud/1/oxzo648ftzr93i4hao9t78ivk8jmrqiw0iexydyt5dvl0g0u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
    <form id="delete" name="delete" action="{{route('posts.destroy', $post)}}" method="POST">
        @csrf
        @method('DELETE')
    </form>
    <form action="{{route('posts.update', $post)}}" method="POST" class="admin-form">
        @csrf
        @method('PUT')
        <div class="flex justify-between items-center gap-16 sticky top-2 bg-white border dark:border-none dark:bg-slate-800 p-4 rounded-lg">
            <h1 class="text-2xl font-semibold">
                {{__('Edit article')}}
            </h1>
            <div class="flex gap-6 items-center  rounded-lg">
                <button type="submit" form="delete" class="text-sm opacity-60 hover:opacity-100 duration-300">
                    {{__('Move to trash')}}
                </button>
                <button type="submit" class="btn-primary">
                    {{__('Save')}}
                </button>
            </div>
        </div>
        <div class="mt-8 border bg-white dark:border-none dark:bg-slate-800 rounded-lg p-6">
            <h2 class="mb-6 uppercase font-bold text-lg">{{__('Article details')}}</h2>
            <div class="mb-4">
                <label for="title">{{__('Title')}}</label>
                <input type="text" id="title" name="title" class="text-2xl" placeholder=" " value="{{old('title', $post->title)}}">
            </div>
            <div class="mb-4">
                <label for="slug">{{__('Slug')}}</label>
                <input type="text" id="slug" name="slug" placeholder=" " value="{{old('slug', $post->slug)}}">
            </div>
            <div>
                <label for="description">{{__('Description')}}</label>
                <textarea id="description" name="description">{{old('description', $post->description)}}</textarea>
            </div>

        </div>
        <div class="mt-16">
            <textarea id="content" name="content" aria-label="{{__('PostService content')}}">
                {!! old('content', $post->content) !!}
            </textarea>
        </div>
        <div class="grid grid-cols-2 gap-6 mt-16">
            <div class="border bg-white dark:border-none dark:bg-slate-800 p-6 rounded-lg">
                <h2 class="mb-6 uppercase font-bold text-lg">{{__('SEO Settings')}}</h2>
                <div class="mb-4" x-data="{content: '{{old('seo_title', $post->seo_title)}}'}">
                    <label for="seo_title">{{__('SEO Title')}}</label>
                    <input type="text" id="seo_title" name="seo_title" placeholder=" " x-model="content">
                    <p x-text="`${content.length} of 50`" class="text-xs mt-2 text-right opacity-60"></p>
                </div>
                <div x-data="{content: '{{old('seo_description', $post->seo_description)}}'}">
                    <label for="seo_description">{{__('SEO Title')}}</label>
                    <textarea x-model="content" type="text" id="seo_description" name="seo_description" placeholder=" ">
                    </textarea>
                    <p x-text="`${content.length} of 150`" class="text-xs mt-2 text-right opacity-60"></p>
                </div>
            </div>
            <div class="border bg-white dark:border-none dark:bg-slate-800 p-6 rounded-lg">
                <h2 class="mb-6 uppercase font-bold text-lg">{{__('Categorization')}}</h2>
                <div class="mb-4">
                    <label for="language">{{__('Language')}}</label>
                    <select name="language_code" id="language_code">
                        @foreach(\App\Models\Language::all('id','language_code') as $language)
                            <option value="{{$language->id}}" @selected(old('language_code', $post->language_id )=== $language->id)>{{\App\Models\Language::getTitle($language->language_code)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="category_id">{{__('Category')}}</label>
                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all('id','title') as $category)
                            <option value="{{$category->id}}" @selected(old('category_id', $post->category->id??0 )=== $category->id)>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                @php
                    $selectedTags = $post->tags->map(fn(\App\Models\Tag $tag) => $tag->id)->toArray();
                    $tags = \App\Models\Tag::all('id', 'title');
					$tags = array_combine($tags->map(fn(\App\Models\Tag $tag) => $tag->id)->toArray(), $tags->map(fn(\App\Models\Tag $tag) => $tag->title)->toArray());
                @endphp
                <div class="mb-4">
                    <label for="tags">{{__('Tags')}}</label>
                    <script>
                        const tagsData = () => ({
                            selectedTags: JSON.parse('<?= json_encode($selectedTags) ?>'),
                            tags: JSON.parse('<?= json_encode($tags) ?>'),

                            isSelected(id) {
                                id = parseInt(id);
                                return this.selectedTags.includes(id);
                            },

                            toggle(id) {
                                id = parseInt(id);
                                if (this.isSelected(id)) {
                                    this.selectedTags = this.selectedTags.filter((element) => element !== id);
                                } else {
                                    this.selectedTags.push(id);
                                }
                            }
                        });
                    </script>
                    <div x-data="tagsData()" x-init="console.log(selectedTags)" class="flex flex-wrap gap-y-2 gap-x-4 h-32 overflow-y-auto mt-2">
                        <template x-for="(title, id) in tags" :key="id">
                            <div x-text="title"
                                 class="py-1 text-sm rounded-full cursor-pointer duration-300 px-4"
                                 :class="{
                                    'bg-orange-500': isSelected(id),
                                    'bg-slate-700': !isSelected(id)
                                 }"
                                 @click="toggle(id)"
                            ></div>
                        </template>
                        <input type="hidden" name="tags" x-model="selectedTags.join(',')">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @section('footerScripts')
        <script>

            tinymce.init({
                selector: 'textarea#content',
                skin: 'snow',
                icons: 'thin',
                menubar: false,
                plugins: 'quickbars image lists code table codesample',
                toolbar: 'blocks | forecolor backcolor | bold italic underline strikethrough | link image blockquote codesample | align bullist numlist | code ',
                height: 800,
                content_style: 'body { margin: 2rem; }'
            });

            // new Choices('select#tags')
        </script>
    @endsection
@endsection
