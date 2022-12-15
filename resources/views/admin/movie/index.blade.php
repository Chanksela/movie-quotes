<x-layout>
    <x-dashboard.layout>
        <x-dashboard.header>
            <x-dashboard.link route='admin.movie.create' name="{{ __('movie.add_movie') }}" />
            <x-dashboard.link route='admin.movie.index' name="{{ __('movie.all_movies') }}" />
        </x-dashboard.header>
        <div class="w-full flex-col">
            @foreach ($movies as $movie)
                <div class="flex justify-between border-b-2 border-stone-500 ">
                    <a class="flex justify-start w-2/3" href="{{ route('movie.quotes', ['movie' => $movie->slug]) }}">
                        {{ $movie->title }}</a>
                    <a
                        href="{{ route('admin.movie.edit', ['movie' => $movie->slug]) }}"class="text-green-400 w-1/3 flex justify-center">{{ __('buttons.edit') }}</a>
                    <div>
                        <form class="w-1/3" action="{{ route('admin.movie.delete', ['movie' => $movie->slug]) }} "
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit' class="w-full text-red-600">{{ __('buttons.delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </x-dashboard.layout>
</x-layout>
