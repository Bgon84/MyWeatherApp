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
                    {{$data->current->wind_dir}}
                    {{$windUnit == 'kph' ? $data->current->wind_kph : $data->current->wind_mph}} {{$windUnit}}
                </li>
                <li>
                    <b>Gusts:</b>
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