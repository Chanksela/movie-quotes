<x-layout>
    <x-dashboard.layout>
        <x-dashboard.header>
            <x-dashboard.link route='admin.quote.create' name="{{ __('quote.add_quote') }}" />
            <x-dashboard.link route='admin.quote.index' name="{{ __('quote.all_quotes') }}" />
        </x-dashboard.header>
        <div class="w-full flex-col">
            @foreach ($quotes as $quote)
                <div class="flex justify-between border-b-2 border-stone-500 ">
                    <a class="flex justify-start w-2/3"href="{{ route('admin.quote.edit', ['quote' => $quote->id]) }}">
                        {{ $quote->body }}</a>
                    <a href="{{ route('admin.quote.edit', ['quote' => $quote->id]) }}"
                        class="text-green-400 w-1/3 flex justify-center">{{ __('buttons.edit') }}</a>
                    <div>
                        <form class="w-1/3" action="{{ route('admin.quote.delete', ['quote' => $quote->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type='submit'class="w-full text-red-600">{{ __('buttons.delete') }}</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </x-dashboard.layout>
</x-layout>
