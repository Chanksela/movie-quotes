<x-layout>
    <div class="flex flex-col justify-center items-center my-8">
        <h1 class="text-left w-full text-2xl mb-2">{{ $movie->title }}</h1>
        @foreach ($quotes as $quote)
            <div class="flex justify-center items-center mb-2">
                <img src="{{ asset('storage/' . $quote->thumbnail) }}" alt="picture" class=" w-96 h-64">
            </div>
            <p class="mb-4">"{{ $quote->body }}"</p>
        @endforeach
        <div class="flex justify-center items-center ">
            <a href="{{ route('home') }}" class="bg-stone-500 rounded text-white font-semibold p-1 ">Go Back</a>
        </div>
    </div>

</x-layout>
