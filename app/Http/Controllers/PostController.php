<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
            },
        ]);
    }

    public function archive()
    {
        return view('blog')->with([
            'posts' => Post::orderBy('created_at', 'desc')->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        return redirect(route('posts.edit', Post::create([
            'title' => __('Draft post'),
            'slug' => Post::validateSlug('draft-post'),
        ])));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('Models.Post.show')->with([
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('Models.Post.edit')->with([
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = Post::updateOrCreate([
            'slug' => ! empty($request->get('slug')) ? $request->get('slug') : Post::validateSlug($request->get('title ')),
        ], [
            'title' => $request->get('title'),
            'description' => $request->get('description', ''),
            'content' => $request->get('content'),
            'language_id' => $request->get('language_code'),
            'category_id' => $request->get('category_id'),
            'seo_title' => $request->get('seo_title', $request->get('title')),
            'seo_description' => $request->get('seo_description', $request->get('description')),
        ]);
        if (! empty($request->get('tags', []))) {
            $post->tags()->sync(explode(',', $request->get('tags', [])));
        }
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
        $post->update(['trashed' => false]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
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
