<aside class="fixed top-1/2 left-0">
    <div class="flex-col">
        <div class="m-2">
            <a href="{{ route('locale', 'ka') }}"
                class="{{ app()->currentLocale() === 'en' ? 'rounded-full border-2 border-white p-1 hover:bg-white hover:text-stone-500' : 'rounded-full border-2 border-white p-1 bg-white text-stone-500' }}">ka</a>
        </div>
        <div class="m-2">
            <a href="{{ route('locale', 'en') }}"
                class="{{ app()->currentLocale() === 'ka' ? 'rounded-full border-2 border-white p-1 hover:bg-white hover:text-stone-500' : 'rounded-full border-2 border-white p-1 bg-white text-stone-500' }}">en</a>
        </div>
    </div>
</aside>
