<div class="bg-gray-100 max-w-lg mx-auto m-6 p-5 rounded-lg">
    <form>
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
                    Overview: <br><br> {{ $this->selectedService->name }} - {{ $this->selectedService->duration }} minutes with {{ $this->selectedEmployee->name }}
                    <br> 📅  {{ $this->timeObject->format('D jS M Y') }}
                    <br> 🕰  {{ $this->timeObject->format('H:i') }}
                </div>
            </div>
        @endif
    </form>
</div>
