@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6">Izmjeni unos</h2>

    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('blog._form', ['buttonText' => 'Spasi izmjene'])
    </form>
</div>
@endsection
