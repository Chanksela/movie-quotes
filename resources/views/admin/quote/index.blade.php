<x-layout>
    <x-dashboard.layout>
        <x-dashboard.header>
            <x-dashboard.link route='admin.quote.create' name="{{ __('quote.add_quote') }}" />
            <x-dashboard.link route='admin.quote.index' name="{{ __('quote.all_quotes') }}" />
        </x-dashboard.header>
        <div class="w-full flex-col">
            @foreach ($movies as $movie)
                <div class="flex justify-between items-center border-b-2 border-stone-500">
                    <a class="flex justify-start w-1/3" href="{{ route('movie.quotes', ['movie' => $movie->slug]) }}">
                        {{ $movie->title }} </a>
                    <a href="{{ route('admin.quote.show', ['movie' => $movie->slug]) }}"
                        class="text-yellow-400 w-1/3 flex justify-end">{{ __('quote.all_quotes') }}</a>
                </div>
            @endforeach
        </div>

    </x-dashboard.layout>
</x-layout>
