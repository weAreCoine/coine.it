<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StorePostRequest;
    use App\Http\Requests\UpdatePostRequest;
    use App\Models\Post;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;

    class PostController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            $orderBy = request('order_by', 'created_at');
            $order = request('order', 'desc');

            return view('Models.Post.index')->with([
                'posts' => Post::whereTrashed(request('trashed', '0') === '1')->orderBy($orderBy, $order)->paginate(20),
                'order_by' => $orderBy,
                'order' => $order === 'desc' ? '<i class="fa-solid fa-angle-down mr-2"></i>' : '<i class="fa-solid fa-angle-up mr-2"></i>',
                'getOrderByLink' => function (string $orderField) use ($order, $orderBy) {
                    $newParameters['order_by'] = $orderField;
                    if ($orderField !== $orderBy) {
                        $newParameters['order'] = 'desc';
                    } else {
                        $newParameters['order'] = $order === 'desc' ? 'asc' : 'desc';
                    }
                    return route('posts.index', array_merge(request()->query(), $newParameters));
                }
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function create()
        {
            $post = new Post([
                'title' => __('Draft post'),
                'slug' => Post::validateSlug('draft-post')
            ]);
            $post->save();
            return redirect(route('posts.edit', $post));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \App\Http\Requests\StorePostRequest $request
         * @return \Illuminate\Http\Response
         */
        public function store(StorePostRequest $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\Response
         */
        public function show(Post $post)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function edit(Post $post)
        {
            return view('Models.Post.edit')->with([
                'post' => $post
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \App\Http\Requests\UpdatePostRequest $request
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(UpdatePostRequest $request, Post $post)
        {
            $slug = Post::validateSlug(empty($request->get('slug')) ? $post->title : $request->get('slug'));

            $validSlug = $slug;
            while (Post::whereSlug($validSlug)->count() > 0) {
                static $i = 1;
                $validSlug = "$slug-$i";
            }

            $post->title = $request->get('title');
            $post->slug = $validSlug;
            $post->description = $request->get('description', '');
            $post->content = $request->get('content');
            $post->language_id = $request->get('language_code');
            $post->category_id = $request->get('category_id');
            $post->seo_title = $request->get('seo_title', $request->get('title'));
            $post->seo_description = $request->get('seo_description', $request->get('description'));
            $post->tags()->sync(explode(',', $request->get('tags', [])));
            $post->save();
            session()->flash('success', __('Article successfully saved'));
            return redirect()->back();
        }

        public function emptyTrash()
        {
            Post::whereTrashed(1)->each(function (Post $post) {
                $post->delete();
            });
            return redirect()->back();
        }

        public function revive(Post $post)
        {
            $post->trashed = 0;
            $post->save();
            return redirect()->back();
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Post $post
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy(Post $post)
        {
            if ($post->trashed === 1) {
                $post->delete();
            } else {
                $post->trashed = 1;
                $post->save();
            }
            return redirect()->back();
        }
    }
