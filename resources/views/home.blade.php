@extends('layouts.app')

@section('title', 'Pocetna')

@section('content')
    <h1 class="text-3xl md:text-6xl text-center font-bold mb-24">Najnovije objave studenata Sveucilista Vitez</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($blogs as $blog)
        <a href="{{ route('blog.show', $blog['id']) }}" class="bg-white border border-gray-300 rounded-lg shadow-lg overflow-hidden">
            <img src="{{ $blog['picture'] }}" alt="{{ $blog['title'] }}" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold text-gray-800">{{ $blog['title'] }}</h3>
                <p class="text-sm text-gray-600 mt-2">{{ $blog['description'] }}</p>

                <div class="flex justify-start items-center mt-4">
                    <span class="text-sm text-gray-500">Autor: {{ $blog['author'] }}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endsection
