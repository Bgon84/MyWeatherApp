<div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg text-gray-900 dark:text-gray-100">

    <div class="p-4">
        <x-text-input id="location" class="block mt-1 w-full" type="text"
            required autofocus autocomplete="username" 
            placeholder="Enter City or Zip Code" wire:model="location"/>
        <x-primary-button class="mt-2" wire:click="$refresh">{{ __('Get Weather') }}</x-primary-button>
    </div>

    @if(!is_string($data))
        <div class="p-8"> 
            @include('livewire.partials.current-conditions')
            @include('livewire.partials.five-day')
    @elseif($data == 'error')
            <div class="p-4 text-gray-900 dark:text-gray-100">
                {{ __('An Error Has Occurred! Please review your search term and try again.') }}
            </div> 
        </div>
    @endif
    
</div>