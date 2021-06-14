<div class="bg-blue-200 max-w-sm mx-auto m-6 p-5 rounded-lg">
    <form>
        <label for="service" class="inline-block text-black font-semibold mb-2">Select Service</label>
        <select name="service" id="service" class="bg-white h-10 w-full border-none rounded-lg" wire:model="state.service">
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
    </form>
</div>
