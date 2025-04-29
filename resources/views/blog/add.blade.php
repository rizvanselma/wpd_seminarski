@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6">
    <h2 class="text-2xl font-bold mb-6">Dodaj novu objavu</h2>

    <form action="{{ route('blog.create') }}" method="POST" enctype="multipart/form-data">
        @include('blog._form', ['buttonText' => 'Objavi'])
    </form>
</div>
@endsection
