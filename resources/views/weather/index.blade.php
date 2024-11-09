<x-app-layout>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @include('weather.partials.search-form')
        <!-- </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8"> -->
            @include('weather.partials.show-weather')
        </div>
    </div>
</x-app-layout>
