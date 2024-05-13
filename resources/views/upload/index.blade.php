<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload File') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 text-white">
            <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data" style=" padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.15);">
                @csrf
                <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
                <input type="text" name="name" id="name" style="display: block; width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ddd;">
                <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
                <textarea name="description" id="description" style="display: block; width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: 1px solid #ddd;"></textarea>
                <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">Image:</label>
                <input type="file" name="image" id="image" style="display: block; margin-bottom: 10px;">
                <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>