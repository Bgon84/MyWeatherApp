<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">

    <div class="p-4">
        <x-text-input id="location" class="block mt-1 w-full" type="text"
            required autofocus autocomplete="username" 
            placeholder="Enter City or Zip Code" wire:model="location"/>
        <x-primary-button class="mt-2" wire:click="$refresh">{{ __('Get Weather') }}</x-primary-button>
    </div>

    @if(!is_string($data))
        <div class="p-8"> 
        <!-- TODO implement $windUnit and $pressureUnit -->

            <h2 class="mt-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
                {{$data->location->name}}, {{$data->location->region}}
            </h2>
            
            <img src="{{$data->current->condition->icon}}" alt="{{$data->current->condition->text}}"/>
            <span class="ms-2">
                {{$data->current->condition->text}} 
                {{$tempUnit == 'F' ? $data->current->temp_f : $data->current->temp_c}}&deg {{$tempUnit}}
            </span>

            <div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
                    Current Conditions:
                </h2>
                
                <div class="p-6 grid grid-cols-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>                
                        <ul>
                            <li>
                                <b>Wind:</b> 
                                {{$data->current->wind_dir}} at
                                {{$windUnit == 'kph' ? $data->current->wind_kph : $data->current->wind_mph}} {{$windUnit}}
                            </li>
                            <li>
                                <b>Wind Gusts:</b>
                                {{$windUnit == 'kph' ? $data->current->gust_kph : $data->current->gust_mph}} {{$windUnit}}
                            </li>
                            <li>
                                <b>Wind Chill:</b>
                                {{$tempUnit == 'F' ? $data->current->windchill_f : $data->current->windchill_c}}&deg {{$tempUnit}}
                            </li>
                        </ul>
                    </div>

                    <div>
                        <ul>
                            <li>
                                <b>Pressure:</b>
                                {{$pressureUnit == 'mb' ? $data->current->pressure_mb : $data->current->pressure_in}} {{$pressureUnit}}
                            </li>
                            <li>
                                <b>Humidity:</b> 
                                {{$data->current->humidity}}%
                            </li>
                            <li>
                                <b>Dew Point:</b> 
                                {{$tempUnit == 'F' ? $data->current->dewpoint_f : $data->current->dewpoint_c}}&deg {{$tempUnit}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="text-xs text-right">{{date('F j Y g:i:s', $data->location->localtime_epoch)}}</div>
            </div>
            
            <div>
                <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
                    5 Day Forecast:
                </h2>   
                
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                   
                    @foreach($data->forecast->forecastday as $day)
                        <div class="mb-2 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                            <div class="relative text-center">
                                {{date('F j Y', $day->date_epoch)}} 
                                <img src="{{$day->day->condition->icon}}" 
                                    alt="{{$day->day->condition->text}}" 
                                    class="m-auto"/>
                                {{$day->day->condition->text}} 
                                <span class="text-xl font-extrabold">                        
                                    {{$tempUnit == 'F' ? $day->day->maxtemp_f : $day->day->maxtemp_c}}&deg {{$tempUnit}}
                                </span>
                                /
                                {{$tempUnit == 'F' ? $day->day->mintemp_f : $day->day->mintemp_c}}&deg {{$tempUnit}}
                                Wind:
                                {{$windUnit == 'kph' ? $day->day->maxwind_kph : $day->day->maxwind_mph}} {{$windUnit}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @elseif($data == 'error')
            <div class="p-4 text-gray-900 dark:text-gray-100">
                {{ __('An Error Has Occurred! Please review your search term and try again.') }}
            </div> 
        </div>
    @endif

</div>