<x-layout>
    <x-dashboard.layout>
        <x-dashboard.header>
            <x-dashboard.link route='admin.quote.create' name="{{ __('quote.add_quote') }}" />
            <x-dashboard.link route='admin.quote.index' name="{{ __('quote.all_quotes') }}" />
        </x-dashboard.header>
        <form action="{{ route('admin.quote.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex-col">
                <div>
                    <label for="movie_id" class="font-semibold">{{ __('quote.title') }}</label>
                </div>
                <select name="movie_id" id="movies" class="w-full text-center">
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select>
            </div>
            <label for="thumbnail" class="font-semibold">{{ __('quote.picture') }}</label>
            <x-form.input name='thumbnail' type='file' />
            <label for="body_en" class="font-semibold">Quote</label>
            <x-form.input name='body_en' type='text' />
            <label for="body_ka" class="font-semibold">ციტატა</label>
            <x-form.input name='body_ka' type='text' />
            <x-form.button class="w-1/2">{{ __('buttons.add') }}</x-form.button>
        </form>
    </x-dashboard.layout>
</x-layout>
