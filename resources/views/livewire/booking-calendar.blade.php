<div class="bg-white rounded-md">
    <div class="flex items-center justify-center relative">
        @if($this->weekIsGreaterThanCurrent)
            <button type="button" class="p-4 absolute left-0 top-0" wire:click="decrementCalendarWeek">
                <svg class="w-6 h-6 text-gray-400 hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
            </button>
        @endif

        <div class="text-lg font-semibold p-4">
            {{ $this->calendarStartDate->format('F Y') }}
        </div>

        <button type="button" class="p-4 absolute right-0 top-0" wire:click="incrementCalendarWeek">
            <svg class="w-6 h-6 text-gray-400 hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
        </button>
    </div>

    <div class="flex justify-between items-center px-3 border-b border-gray-300 pb-2">
        @foreach($this->calendarWeekInterval as $day)
            <button type="button" class="text-center group focus:outline-none" wire:click="setDate({{ $day->timestamp }})">
                <div class="text-md leading-none mb-2 text-gray-700">
                    {{ $day->format('D') }}
                </div>

                <div class="text-lg leading-none p-1 text-black group-hover:text-white bg-gray-300 font-semibold rounded-full w-9 h-9 group-hover:bg-red-600 flex items-center justify-center {{ $date === $day->timestamp ? 'bg-red-600 text-white' : '' }}">
                    {{ $day->format('d') }}
                </div>
            </button>
        @endforeach
    </div>

    <div class="max-h-52 overflow-y-scroll">
        @if ($this->availableTimeSlots->count())
            @foreach ($this->availableTimeSlots as $slot)
                <input type="radio" name="time" id="time_{{ $slot->timestamp }}" value="{{ $slot->timestamp }}" class="sr-only" wire:model="time">

                <label for="time_{{ $slot->timestamp }}" class="w-full text-left focus:outline-none px-4 py-2 flex items-center border-b border-gray-200">
                    @if($slot->timestamp == $time)
                        <svg class="w-6 h-6 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    @endif
                    {{ $slot->format('H:i') }}
                </label>
            @endforeach
        @else
            <div class="text-center text-red-600 px-4 py-2">
                Sorry, Nothing Available
            </div>
        @endif
    </div>
</div>
