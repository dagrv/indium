<div class="bg-blue-200 max-w-lg mx-auto m-6 p-5 rounded-lg">
    <form>
        <div class="mb-6">
            <label for="service" class="inline-block text-black font-semibold mb-2">Select</label>
            <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.service">
                <option value="">Service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label for="employee" class="inline-block text-black font-semibold mb-2">Select</label>
            <select name="employee" id="employee" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.employee">
                <option value="">Employee</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
</div>
