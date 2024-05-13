<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Media Library') }}
        </h2>
    </x-slot>

    <section class="flex flex-wrap justify-around m-1 md:m-20">
        @foreach ($photos as $photo)
            <div class="bg-slate-200 rounded p-10 md:p-20 w-full md:w-1/2 mb-5 md:mb-0">
                <img src="{{ asset($photo->image) }}" alt="{{ $photo->name }}" class="w-full h-48 object-cover object-center">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-white">{{ $photo->name }}</div>
                    <p class="text-white text-base">
                        {{ $photo->description }}
                    </p>
                </div>
            </div>
        @endforeach
    </section>
</x-app-layout>