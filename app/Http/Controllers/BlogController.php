<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()->latest()->paginate(6)->transform(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'description' => $blog->description,
                'picture' => $blog->picture,
                'author' => User::find($blog->author_id)->name,
            ];
        });
        return view('home', compact('blogs'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        $blogs = Blog::query()->where('author_id', $user->id)->get();

        // $blogs = Blog::all();

        return view('dashboard', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $user = Auth::user();

        return $blog->author_id === $user->id
            ? view('blog.edit', compact('blog'))
            : redirect()->route('blog.show', $blog);
    }

    public function addComment(Request $request, $blogId) {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Comment::create([
            'blog_id' => $blogId,
            'author_id' => Auth::user()->id,
            'content' => $request->content,
        ]);

        return redirect()->route('blog.show', $blogId);
    }

    public function show($id)
    {
        $blog = Blog::with('comments.blog', 'comments.author')->findOrFail($id);

        return view('blog.show', compact('blog'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $picture = asset('600x400.svg');

        if ($request->hasFile('picture')) {
            $picture = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads'), $picture);
            $picture = asset('uploads/' . $picture);
        }

       $blog = auth()->user()->blogs()->create([
            'title' => $request->title,
            'description' => $request->description,
            'picture' => $picture,
        ]);

        return redirect()->route('blog.show', $blog);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $blog = Blog::findOrFail($id);

        $picture = $blog->picture;

        if ($request->hasFile('picture')) {
            $picture = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('uploads'), $picture);
            $picture = asset('uploads/' . $picture);
        } else if (!$blog->picture) {
            $picture = asset('600x400.svg');
        }

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'picture' => $picture,
        ];


        $blog->update($data);

        return redirect()->route('dashboard');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('dashboard');
    }
}
