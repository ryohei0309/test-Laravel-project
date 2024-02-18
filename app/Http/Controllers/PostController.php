<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        // TODO:Requestファイルを新たに作成して記載を分ける。
        $validated = $request->validate([
            'title' => 'required | max:20',
            'body' => 'required | max:400',
        ]);
        
        // TODO:PostRepositoryを作成して記載を分ける。
        $post = Post::create($validated);

        $request->session()->flash('message', '保存しました');

        return back();
    }
}
