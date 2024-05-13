<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Media Library') }}
        </h2>
    </x-slot>

    <section class="flex flex-wrap justify-around">
    @foreach ($photos as $photo)
        <div class="bg-slate-600 rounded p-2 w-1/4 m-4">
            <img src="{{ asset($photo->image) }}" alt="{{ $photo->name }}" class="w-full h-48 object-cover object-center">
            <div class="px-6 py-4">
                <div class="font-bold text-xl text-white">{{ $photo->name }}</div>
                <p class="text-white text-base">
                    {{ $photo->description }}
                </p>
            </div>
        </div>
    @endforeach
</section>

</x-app-layout>