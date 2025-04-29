@extends('layouts.app')

@section('title', 'Registracija')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center mb-6">Napravite svoj racun</h2>

    <form method="POST" action="{{ route('auth.register.create') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Ime i prezime</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Lozinka</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Potvrdite lozinku</label>
            <input type="password" name="password_confirm" id="password_confirm" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Registracija</button>
        </div>
    </form>

    <div class="text-center">
        <p class="text-sm text-gray-600">Vec imate racun? <a href="{{ route('auth.login') }}" class="text-indigo-600 hover:text-indigo-700">Prijavite se</a></p>
    </div>
</div>
@endsection
