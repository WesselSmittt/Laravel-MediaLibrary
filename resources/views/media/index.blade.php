<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight mb-4">
            {{ __('Media Library') }}
        </h2>
    <form action="{{ route('media.index') }}" method="GET" class="flex">
        <input type="text" name="search" placeholder="Zoeken..." value="{{ request()->query('search') }}" class="px-3 py-2 border rounded">
        <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded">Zoeken</button>
        <a href="{{ route('media.index') }}" class="px-3 py-2 bg-red-500 text-white rounded ml-2">Clear</a>
    </form>
    </x-slot>

    <section class="flex flex-wrap justify-around">
    @foreach ($photos as $photo)
        <div class="bg-gray-800 rounded p-2 w-1/4 m-4">
            <img src="{{ asset($photo->image) }}" alt="{{ $photo->name }}" class="w-full h-48 object-cover object-center">
            <div class="px-6 py-4">
                <div class="font-bold text-xl text-white">{{ $photo->name }}</div>
                <p class="text-white text-base">
                    {{ $photo->description }}
                </p>
                <form action="{{ route('photo.destroy', $photo) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je deze foto wilt verwijderen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Verwijder
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</section>

</x-app-layout>