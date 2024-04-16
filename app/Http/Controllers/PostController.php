<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate();

        // dd($posts);
        return view('admin/posts/index', compact('posts'));
    }
    public function create()
    {
        return view('admin/posts/create');
    }
    public function store(StoreUpdatePost $request)
    {
        // Post::create([
        //     'title' => $request->title,
        //     'content' => $request->content
        // ]);

        Post::create($request->all());
        return redirect()->route('posts.index')->with('message', 'Registro editado com sucesso!');
    }
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            return redirect()->route('posts.index');
        }
        return view('admin.posts.show', compact('post'));
    }
    public function destroy($id)
    {

        if (!$post = Post::where('id', $id)->first())
            return redirect()->route('posts.index');

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('message', 'Registro deletado com sucesso!');
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            return redirect()->back();
        }
        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        $post = Post::where('id', $id)->first();
        if (!$post) {
            return redirect()->back();
        }
        $post->update($request->all());

        return redirect()
            ->route('posts.index')
            ->with('message', 'Registro atualizado com sucesso!');
    }
    public function search(Request $request)
    {
        $filters = $request->all();

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate(2);
        return view('admin.posts.index', compact('posts', 'filters'));
    }
}
