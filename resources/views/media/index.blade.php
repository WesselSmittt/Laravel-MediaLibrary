<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Media Library') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($photos as $photo)
                <img src="{{ asset($photo->image) }}" alt="{{ $photo->name }}">
            @endforeach
        </div>
    </div>
</x-app-layout>