<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
    <form method="POST" action="{{ route('getWeather') }}">
        @csrf
        <div class="p-4 text-gray-900 dark:text-gray-100">
            <div>
                <x-input-label for="location" :value="__('Location')" />
                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" 
                    :value="old('location')" required autofocus autocomplete="username" 
                    placeholder="Enter City or Zip Code"/>
                <x-input-error :messages="$errors->get('location')" class="mt-2" />
            </div>
            <x-primary-button class="mt-2">{{ __('Get Weather') }}</x-primary-button>
        </div>
    </form>
</div>