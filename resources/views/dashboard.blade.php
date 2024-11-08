<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Weather') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100 text-center">
                    {{ __("Welcome! Enter a location below to view weather information.") }}
                </div>
                <form method="POST" action="{{ route('getWeather') }}">
                    @csrf
                    <div class="grid grid-cols-2 p-4 text-gray-900 dark:text-gray-100">
                        <div>
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="days" :value="__('Number of Days for Forecast')" />
                            <select 
                                class="ml-2 g-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="days" required
                            >
                                @for($i=1; $i<15; $i++)
                                    <option value="{{$i}}" @if($i==5) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                            <x-input-error :messages="$errors->get('days')" class="mt-2" />
                        </div>
                        
                    </div>

                    <x-primary-button class="mt-2">{{ __('Get Weather') }}</x-primary-button>

                </form>
            </div>

            @if(!is_null($data) && $data != 'error')
                <!-- TODO make this a component -->
                <div class="p-4 text-gray-900 dark:text-gray-100">           
                    <h1>Location: {{$data->location->name}}, {{$data->location->region}}</h1>
                    <!-- TODO timezone crap again -->
                    <h2>Current Conditions: {{date('F j Y g:i:s', $data->location->localtime_epoch)}}</h2>
                    <ul>
                        <!-- TODO user settings for unit preference -->
                        <li>
                            <img src="{{$data->current->condition->icon}}" alt="{{$data->current->condition->text}}"/>
                            {{$data->current->condition->text}}
                        </li>
                        <li>{{$data->current->temp_f}}&deg</li>
                        <li>Wind: {{$data->current->wind_dir}} at {{$data->current->wind_mph}} mph gusting to {{$data->current->gust_mph}} mph </li>
                        <li>Pressure: {{$data->current->pressure_in}} in</li>
                        <li>Humidity: {{$data->current->humidity}}%</li>
                    </ul>
                </div>
            @elseif($data == 'error')
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    {{ __('An Error Has Occurred! Please review your search term and try again.') }}
                </div> 
            @endif
            <!-- TODO Forecast -->

        </div>
    </div>
</x-app-layout>
