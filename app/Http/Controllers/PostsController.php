<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
     public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->paginate(10);

        return view('posts.search-results', compact('posts', 'query'));
    }
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {

        // Validation
         $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz' => 'required|string',
            'body_ru' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // rasm uchun validation
        ]);



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }else {
            $requestData['image'] = 'default.jpg'; // mavjud bo'lgan default rasm nomi
        }

        Post::create($requestData);

        return redirect()->route('admin.posts.index');
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $requestData = $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'body_uz' => 'required|string',
            'body_ru' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Eski rasmini o'chirish
            if ($post->image && file_exists(public_path('admin/images/' . $post->image))) {
                unlink(public_path('admin/images/' . $post->image));
            }
            
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $post->update($requestData);

        return redirect()->route('admin.posts.index')->with('success', 'Maqola muvaffaqiyatli yangilandi!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
