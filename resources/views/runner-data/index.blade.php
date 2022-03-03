<x-app-layout>
    <div class="container px-6 mx-auto grid pb-6">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Runner Data List
        </h2>

        <div class="w-full overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Runner</th>
                            <th class="px-4 py-3">Speed(kmph)</th>
                            <th class="px-4 py-3">Radius(m)</th>
                            <th class="px-4 py-3">Start Time</th>
                            <th class="px-4 py-3">End Time</th>
                            <th class="px-4 py-3">Duration</th>
                            <th class="px-4 py-3">Number of laps</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($runner as $runners)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{$runners->runner_name}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @php
                                $startTime = strtotime($runners->start_date);
                                $endTime = strtotime($runners->end_date);
                                $differents = $endTime - $startTime;

                                $stTime = date('H:i:s', $startTime);

                                $edTime = date('H:i:s', $endTime);

                                $radius = $runners->radius;
                                $distance = 2*(22/7)*$radius;
                                $speed = $distance / abs($differents);

                            @endphp
                                {{$speed}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$runners->radius}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @php
                                $startTime = date('H:i:s', strtotime($runners->start_date));
                                @endphp
                                {{$startTime}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @php
                                    $endTime = date('H:i:s', strtotime($runners->end_date));
                                @endphp
                                {{$endTime}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @php
                                    $startTime = strtotime($runners->start_date);
                                    $endTime  = strtotime($runners->end_date);
                                    $diff =  $endTime  - $startTime;
                                    $stTime = date('H:i:s', $startTime);
                                    $edTime = date('H:i:s', $endTime);
                                @endphp
                                {{gmdate('H:i:s', $diff)}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$runners->number_of_laps}}
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
