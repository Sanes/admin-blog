<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class GalleryController extends Controller
{
    public function show($gallery)
    {
        $post = Post::findOrFail($gallery);
        // dd($post);
        return view('admin.galleries.base', [ 'post' => $post]);
    }
}
