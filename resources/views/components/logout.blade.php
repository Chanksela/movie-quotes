   <form action="{{ route('logout') }}"
       class="block rounded text-white font-semibold hover:bg-white hover:text-stone-500 " method="POST">
       @csrf
       <button type="submit" class="w-full text-left">{{ __('buttons.logout') }}</button>
   </form>
