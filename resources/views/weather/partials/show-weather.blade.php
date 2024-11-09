@if(!is_null($data) && $data != 'error')
    <h1 class="mt-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
        {{$data->location->name}}, {{$data->location->region}}
    </h1>
    
    <div class="p-4 text-gray-900 dark:text-gray-100">           
        
        <!-- TODO timezone crap again -->
        <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
            Current Conditions:
        </h2>
        <p>{{date('F j Y g:i:s', $data->location->localtime_epoch)}}</p>

        <!-- TODO add tabs (Current, 5 Day, Hourly) -->
        <!-- TODO make a card with 2 columns to display data -->
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