@extends('layouts.app')

@section('title', 'Prijava')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 border border-gray-300 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold text-center mb-6">Prijavite se</h2>

    <form method="POST" action="{{ route('auth.login') }}">
        @csrf

        @error('credentials')
            <p class="text-red-500 text-xs my-4">{{ $message }}</p>
        @enderror

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Lozinka</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
        </div>

        <div class="flex items-center mb-4">
            <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
            <label for="remember" class="ml-2 text-sm text-gray-600">Zapamti me</label>
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Prijava</button>
        </div>
    </form>

    <div class="text-center">
        <p class="text-sm text-gray-600">Nemate racun? <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-700">Registrujte se</a></p>
    </div>
</div>
@endsection
