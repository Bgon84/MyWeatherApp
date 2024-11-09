<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Preferences') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update how you would like to view weather data in this app") }}
        </p>
    </header>


    <form method="post" action="{{ route('preferences.update') }}" class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="favorite_location" :value="__('Favorite Location')" />
            <x-text-input id="favorite_location" name="favorite_location" type="text" class="mt-1 block w-full" 
            value="{{$preferences->favorite_location}}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('favorite_location')" />
        </div>

        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Wind Speed</h3>
        <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
                <input type="radio" @if($preferences->wind_metric == 0) checked @endif id="wind_metric_0" name="wind_speed" value="0" class="hidden peer" required />
                <label for="wind_metric_0" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                    <div class="block">
                        <div class="w-full text-lg font-semibold">MPH</div>
                    </div>
                </label>
            </li>
            <li>
                <input type="radio" @if($preferences->wind_metric == 1) checked @endif id="wind_metric_1" name="wind_speed" value="1" class="hidden peer">
                <label for="wind_metric_1" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">KPH</div>
                    </div>
                </label>
            </li>
        </ul>

        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Temperature</h3>
        <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
                <input type="radio" @if($preferences->temp_metric == 0) checked @endif id="temp_metric_0" name="temperature" value="0" class="hidden peer" required />
                <label for="temp_metric_0" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                    <div class="block">
                        <div class="w-full text-lg font-semibold">&degF</div>
                    </div>
                </label>
            </li>
            <li>
                <input type="radio" @if($preferences->temp_metric == 1) checked @endif id="temp_metric_1" name="temperature" value="1" class="hidden peer">
                <label for="temp_metric_1" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">&degC</div>
                    </div>
                </label>
            </li>
        </ul>

        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">Barometric Pressure</h3>
        <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
                <input type="radio" @if($preferences->pressure_millibar == 0) checked @endif id="pressure_millibar_0" name="pressure_millibar" value="0" class="hidden peer" required />
                <label for="pressure_millibar_0" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                    <div class="block">
                        <div class="w-full text-lg font-semibold">inHg</div>
                    </div>
                </label>
            </li>
            <li>
                <input type="radio" @if($preferences->pressure_millibar == 1) checked @endif id="pressure_millibar_1" name="pressure_millibar" value="1" class="hidden peer">
                <label for="pressure_millibar_1" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">mb</div>
                    </div>
                </label>
            </li>
        </ul>
      
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'preferences-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
