<div class="bg-gray-100 max-w-lg mx-auto m-6 p-5 rounded-lg">
    <form>
        <!-- Bloc 1 - Service -->
        <div class="mb-6">
            <label for="service" class="inline-block text-black font-semibold mb-2">Service</label>
            <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.service">
                <option value="">Please Select</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Bloc 2 - Employee -->
        <div class="mb-6 {{!$employees->count() ? 'opacity-30' : ''}}">
            <label for="employee" class="inline-block text-black font-semibold mb-2">Employee</label>
            <select name="employee" id="employee" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.employee"
                {{ !$employees->count() ? 'disabled="disabled"' : ''}}>
                <option value="">Please Select</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6 {{!$this->selectedService || !$this->selectedEmployee ? 'opacity-30' : ''}}">
            <label for="employee" class="inline-block text-black font-semibold mb-2">Appointment Time</label>
        </div>

        <!-- Bloc 3 - Calendar -->
        <div class="bg-white rounded-md">
            <div class="flex items-center justify-center relative">
                <!-- Back -->
                <button type="button" class="p-4 absolute left-0 top-0">
                    <svg class="w-6 h-6 text-gray-400 hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"></path></svg>
                </button>

                <div class="text-lg font-semibold p-4">
                    January 2021
                </div>

                <!-- Forwards -->
                <button type="button" class="p-4 absolute right-0 top-0">
                    <svg class="w-6 h-6 text-gray-400 hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
                </button>
            </div>

            <div class="flex justify-between items-center px-3 border-b border-gray-300 pb-2">
                <button type="button" class="text-center group focus:outline-none">
                    <div class="text-md leading-none mb-2 text-gray-700">
                        Mon
                    </div>

                    <div class="text-lg leading-none p-1 text-black group-hover:text-white bg-gray-300 font-semibold rounded-full w-9 h-9 group-hover:bg-red-600 flex items-center justify-center">
                        7
                    </div>
                </button>
            </div>

            <div class="max-h-52 overflow-y-scroll">
                <input type="radio" name="time" id="" value="" class="sr-only">

                <label for="" class="w-full text-left focus:outline-none px-4 py-2 flex items-center border-b border-gray-200">
                    <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    13:00
                </label>

                <div class="text-center text-red-600 px-4 py-2">
                    Nothing Available
                </div>
            </div>
        </div>
    </form>
</div>
