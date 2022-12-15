<x-layout>
    <x-wrapper>
        <div class="bg-white text-stone-500 p-4 rounded-xl">
            <form method="POST" action="{{ route('login') }}" class="flex-col">
                @csrf
                <div class="mb-6">
                    <label for="username" class="font-semibold capitalize">{{ __('login.username') }}</label>
                    <x-form.input name='username' type='text' />
                </div>
                <div class="mb-6">
                    <label for="password" class="font-semibold capitalize">{{ __('login.password') }}</label>
                    <x-form.input name='password' type='password' />
                </div>
                <x-form.button class="button">{{ __('buttons.login') }}</x-form.button>
            </form>
        </div>
    </x-wrapper>
</x-layout>
