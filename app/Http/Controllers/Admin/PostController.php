<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Filters\NullFilter;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = QueryBuilder::for(Post::class)
            ->allowedFilters([
                AllowedFilter::custom('category_id', new NullFilter()),
                'published',     
                'pagetitle',     
            ])
            ->orderByDesc('published_at')
            ->get(); 
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(PostStoreRequest $request)
    {
        $post = new Post;
        $post->pagetitle = $request->pagetitle;
        $post->alias = $request->alias;
        $post->user_id = auth()->user()->id;
        $post->published_at = now();
        $post->save();
        return redirect(route('admin.posts.edit', $post->id))->with('post-created', '');
    }    


    public function edit($post)
    {
        $post = Post::findOrFail($post);
        $categories = Category::orderBy('pagetitle')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }


    public function update(PostUpdateRequest $request, $post)
    {
        $post = Post::findOrFail($post);
        $post->pagetitle = $request->pagetitle;
        $post->longtitle = $request->longtitle;
        $post->alias = $request->alias;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->introtext = $request->introtext;
        $post->content = $request->content;
        $post->user_id = auth()->user()->id;
        $post->published = $request->published;
        $post->published_at = $request->published_at;
        $post->update();
        if ($request->tags) {
            $post->retag($request->tags);        }
        else
        {
            $post->detag();
        }
        return redirect(route('admin.posts.index'))->with('post-updated', '');
    }


    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        return redirect(route('admin.posts.index'))->with('post-destroyed', '');
    }
}
