<div class="bg-green-200 max-w-sm mx-auto m-6 p-5 rounded-md">
    <div class="mb-6">
        <div class="text-gray-800 font-bold">
            {{ $appointment->client_name }}, thank you for your reservation. 🎊 <br>
        </div>

        <div class="border-t border-b border-green-700 py-2">
            <div class="font-semibold font-3xl">
                Here's an overview <br> <br>

                <b>{{ $appointment->service->name }} {{ $appointment->service->duration }} minutes <br>
                </b> with <b>{{ $appointment->employee->name }}</b> <br>
            </div>

            <div class="font-2xl">
                🗓 &nbsp; <b>{{ $appointment->date->format('D jS M Y') }}</b> from <b>{{ $appointment->start_time->format('H:i') }}</b> to <b>{{ $appointment->end_time->format('H:i') }}</b>
            </div>
        </div>
    </div>
</div>
