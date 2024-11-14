<div>
    <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100">
        5 Day Forecast:
    </h2>   
    
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        
        @foreach($data->forecast->forecastday as $day)
            <div class="mb-2 border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="relative text-center">
                    <span class="text-2xl">{{date('l, M j, Y', $day->date_epoch)}}</span>
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