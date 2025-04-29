@extends('layouts.app')

@section('title', 'Dashboard')

@php
    $user = Auth::user();
@endphp

@section('content')
    <h2 class="text-2xl font-bold mb-6">Pozdrav, {{ $user->name }}!</h2>

    <div class="mb-24">
        <a href="{{ route('blog.add') }}" class="inline-block px-3 py-1 bg-green-400 text-white rounded-md hover:bg-green-500 text-xs">Dodaj objavu</a>
    </div>

    @if (!$blogs->isEmpty())
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-6 py-3 text-left text-sm font-medium">Slika</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Naziv</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">Opis</th>
                        <th class="px-6 py-3 text-left text-sm font-medium"></th>
                        <th class="px-6 py-3 text-left text-sm font-medium"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <img src="{{ $blog->picture }}" alt="{{ $blog->title }}" class="w-16 h-16 object-contain rounded-md">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $blog->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $blog->description }}</td>
                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('blog.edit', $blog->id) }}" class="inline-block px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500 text-xs">Izmjeni</a>
                        </td>

                        <td class="px-6 py-4 text-sm space-x-2">
                            <a href="{{ route('blog.destroy', $blog) }}" class="inline-block px-3 py-1 bg-red-400 text-white rounded-md hover:bg-red-500 text-xs">Ukloni</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Trenutno nemate dodanih objava.</p>
    @endif
@endsection
