<div class="bg-gray-100 max-w-lg mx-auto m-6 p-5 rounded-lg">
    <form wire:submit.prevent="createBooking">
        <!-- Bloc 1 - Service -->
        <div class="mb-6">
            <label for="service" class="inline-block text-black font-semibold mb-2">Service</label>
            <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.service">
                <option value="">Please Select</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - {{ $service->duration }} minutes</option>
                @endforeach
            </select>
        </div>

        <!-- Bloc 2 - Employee -->
        <div class="mb-6 {{ !$employees->count() ? 'opacity-30' : '' }}">
            <label for="employee" class="inline-block text-black font-semibold mb-2">Employee</label>
            <select name="employee" id="employee" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.employee"
                {{ !$employees->count() ? 'disabled="disabled"' : ''}}>
                <option value="">Please Select</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6 {{ !$this->selectedService || !$this->selectedEmployee ? 'opacity-30' : '' }}">
            <label for="employee" class="inline-block text-black font-semibold mb-2">Appointment Time</label>

            <livewire:booking-calendar :service="$this->selectedService" :employee="$this->selectedEmployee" :key="optional($this->selectedEmployee)->id" />
        </div>

        @if ($this->hasDetailsToBook)
            <div class="mb-6">
                <div class="text-gray-800 font-bold mb-2">
                    🎉 Ready to book !
                </div>

                <div class="border-t border-b border-gray-200 py-2">
                    {{ $this->selectedService->name }} - {{ $this->selectedService->duration }} minutes with {{ $this->selectedEmployee->name }}
                    <br> 📅 &nbsp; {{ $this->timeObject->format('D jS M Y') }}
                    <br> 🕰 &nbsp; {{ $this->timeObject->format('H:i') }}
                </div>
            </div>

            <div class="mb-6">
                <div class="mb-3">
                    <label for="name" class="inline-block text-black font-semibold mb-2">Name</label>
                    <input type="text" name="name" id="name" class="bg-white h-10 w-full border-none rounded-lg" wire:model.defer="state.name">

                    @error('state.name')
                        <div class="font-semibold text-red-500 text-sm mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="inline-block text-black font-semibold mb-2">Email</label>
                    <input type="text" name="email" id="email" class="bg-white h-10 w-full border-none rounded-lg" wire:model.defer="state.email">
                </div>

                @error('state.email')
                    <div class="font-semibold text-red-500 text-sm mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white h-11 px-4 text-center font-semibold rounded-md w-full">Reserve</button>
        @endif
    </form>
</div>
