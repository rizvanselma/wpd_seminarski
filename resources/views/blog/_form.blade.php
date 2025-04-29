@csrf

<div class="mb-4">
    <label class="block text-gray-700 mb-2" for="title">Naziv objave</label>
    <input type="text" name="title" id="title" value="{{ old('title', $blog->title ?? '') }}" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
</div>

<div class="mb-4">
    <label class="block text-gray-700 mb-2" for="description">Opis</label>
    <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400" required>{{ old('description', $blog->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block text-gray-700 mb-2" for="picture">Slika</label>
    <input type="file" name="picture" id="picture" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-400">
</div>

<div class="flex justify-end">
    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
        {{ $buttonText }}
    </button>
</div>
