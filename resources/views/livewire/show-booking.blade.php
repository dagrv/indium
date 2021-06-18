<div class="bg-white border-dashed border-4 border-gray-200  max-w-sm mx-auto m-6 p-5 rounded-md">
    <div class="mb-6">
        <div class="text-gray-800 font-bold text-2xl">
            {{ $appointment->client_name }}, thank you for your reservation 🎉<br>
        </div>

        <div class="border-t border-gray-700 py-2">
            <div class="font-semibold font-3xl">
                <br><p class="text-xl text-center">Overview</p> <br>

                <b> - {{ $appointment->service->name }} {{ $appointment->service->duration }} minutes
                </b> with <b>{{ $appointment->employee->name }}</b>
            </div>

            <br>

            <div class="font-2xl">
                <b> - {{ $appointment->date->format('D jS M Y') }}</b> from <b>{{ $appointment->start_time->format('H:i') }}</b> to <b>{{ $appointment->end_time->format('H:i') }}</b>
            </div>
        </div>
    </div>

    @if(!$appointment->isCancelled())
        <button type="button"
                class="bg-red-500 ring-4 ring-red-500 ring-opacity-50 text-white h-11 px-4 text-lg text-center font-bold rounded-md w-full"
                x-data="{
                    confirmCancellation() {
                        if (window.confirm('Are you sure ?')) {
                            @this.call('cancelBooking')
                        }
                    }
                }"

                x-on:click="confirmCancellation">
            Cancel
        </button>
    @endif

    @if($appointment->isCancelled())
        <p class="text-2xl text-white bg-red-600 p-2 rounded-md text-center shadow-2xl">Your booking is cancelled</p>
    @endif
</div>
