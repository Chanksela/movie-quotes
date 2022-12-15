    @auth
        <div class="w-full flex justify-between items-center bg-gradient-radial">
            <div class="ml-2">
                <a href="{{ route('home') }}" class="w-14 rounded text-white font-semibold  ">{{ __('header.home') }}</a>
            </div>
            <div class="text-white font-medium select-none mr-2" x-data="{ show: false }" @click.away="show: false">
                {{ __('header.welcome') }}, <button class="font-semibold pl-2  " @click="show = !show">
                    {{ auth()->user()->username }}!</button>
                <div class="flex-col  items-center fixed right-0 mr-2 " x-show="show">
                    <a href="{{ route('admin.movie.create') }}"
                        class="block font-semibold  w-full text-left rounded hover:bg-white hover:text-stone-500">{{ __('header.manage_movies') }}</a>
                    <a href="{{ route('admin.quote.create') }}"
                        class="block font-semibold  w-full text-left rounded hover:bg-white hover:text-stone-500">{{ __('header.manage_quotes') }}</a>
                    <x-logout />
                </div>
            </div>
        </div>
    @else
        <div class="w-full flex justify-between items-center">
            <div class="ml-2">
                <a href="{{ route('home') }}" class="w-14 rounded text-white font-semibold">{{ __('header.home') }}</a>
            </div>
            <div class="flex-col  items-center fixed right-0 mr-2 " x-show="show">
                <a href="{{ route('login') }}"
                    class=" w-14 rounded text-white font-semibold  ">{{ __('buttons.login') }}</a>
            </div>
        </div>
    @endauth
