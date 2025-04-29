@extends('layouts.app')

@section('content')
<div class="bg-white p-6">
    <div class="max-w-lg">
        <img src="{{ $blog->picture }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover rounded-md mb-6">
    </div>

    <h2 class="text-3xl font-bold mb-4">{{ $blog->title }}</h2>

    <p class="text-gray-700 mb-4">{{ $blog->description }}</p>

    <a href="{{ route('home') }}" class="inline-block mt-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Nazad na pocetnu</a>

    <hr class="my-8">

<div class="mt-10">
    <h3 class="text-xl font-bold mb-4">Komentari ({{ $blog->comments->count() }})</h3>

    @foreach($blog->comments as $comment)
    <div class="mb-4 p-4 bg-gray-100 rounded-lg">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm text-gray-500">{{ $comment->author->name }} - {{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="text-gray-700">{{ $comment->content }}</p>
    </div>
    @endforeach

    @if (Auth::user())
    <div class="mt-6">
        <h4 class="font-semibold text-lg mb-2">Dodaj komentar</h4>

        <form action="{{ route('blog.comment', $blog->id) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <textarea name="content" rows="4" placeholder="..." class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-400" required></textarea>
            </div>

            <div class="text-right">
                <button type="submit" class="px-5 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Posalji
                </button>
            </div>
        </form>
    </div>
    @endif
</div>
</div>
@endsection
