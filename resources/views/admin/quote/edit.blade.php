<x-layout>
    <x-dashboard.layout>
        <x-dashboard.header>
            <x-dashboard.link route='admin.quote.create' name="{{ __('quote.add_quote') }}" />
            <x-dashboard.link route='admin.quote.index' name="{{ __('quote.all_quotes') }}" />
        </x-dashboard.header>
        <div class="w-full flex-col">
            <form action="{{ route('admin.quote.update', ['quote' => $quote->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex items-center font-semibold justify-between">
                    {{ __('quote.picture') }}: <img src="{{ asset('storage/' . $quote->thumbnail) }}" alt="scene"
                        class="w-10 h-10">
                </div>
                <label for="thumbnail" class="font-semibold">{{ __('quote.picture') }}</label>
                <x-form.input name='thumbnail' type='file' />
                <br>
                <label for="body_en" class="font-semibold">Title</label>
                <x-form.input name='body_en' type='text' :value="$quote->getTranslation('body', 'en')" />
                <label for="body_ka" class="font-semibold">სათაური</label>
                <x-form.input name='body_ka' type='text' :value="$quote->getTranslation('body', 'ka')" />
                <x-form.button>{{ __('buttons.edit') }}</x-form.button>
                <br>
                @if (session()->has('fail'))
                    <p class="text-red-700 font-medium m-20">{{ session()->get('fail') }} </p>
                @endif
            </form>
        </div>
    </x-dashboard.layout>

</x-layout>
