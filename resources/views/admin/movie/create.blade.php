<x-layout>
    <x-dashboard.layout>
        <x-dashboard.header>
            <x-dashboard.link route='admin.movie.create' name="{{ __('movie.add_movie') }}" />
            <x-dashboard.link route='admin.movie.index' name="{{ __('movie.all_movies') }}" />
        </x-dashboard.header>
        <form action="{{ route('admin.movie.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
            @csrf
            <label for='title_en' class="font-semibold">Title</label>
            <x-form.input name='title_en' type='text' />
            <label for='title_ka' class="font-semibold">სათაური</label>
            <x-form.input name='title_ka' type='text' />

            <x-form.button>{{ __('buttons.add') }}</x-form.button>
        </form>
    </x-dashboard.layout>
</x-layout>
