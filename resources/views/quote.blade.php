<x-layout>
    <x-wrapper>
        <div class="flex justify-center">
            <img src="{{ asset('storage/' . $quote->thumbnail) }}" alt="quote-img" class="w-96 h-64">
        </div>
        <p>"{{ $quote->body }}"</p>
        <a href="{{ route('movie.quotes', [$quote->movie->slug]) }}" class="underline">{{ $quote->movie->title }}</a>
    </x-wrapper>
</x-layout>
