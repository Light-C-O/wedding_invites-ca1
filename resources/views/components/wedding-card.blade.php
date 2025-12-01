@props(['bride_name', 'groom_name', 'venue', 'wedding_date_time'])

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Story+Script&display=swap" rel="stylesheet">
</head>

<!-- Wedding Card Component -->
<div class="h-full bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 dark:border-[#7c7467] hover:shadow-lg transition duration-300 text-gray-700 dark:text-gray-300 flex flex-col">
    <p class="text-center font-light border-b-[3px] border-b-gray-200" style="font-family: 'Story Script', cursive;">Celebrating:</p>
    <h4 class="text-center font-bold text-lg">{{ $bride_name }} and {{ $groom_name }}</h4>
    <p class="text-center mt-2">At <span class="underline underline-offset-2 font-semibold">{{ $venue->title }}</span></p>
    <div class="flex justify-between mt-4">
        <p>Date: {{ \Carbon\Carbon::parse($wedding_date_time)->format('F j, Y') }}</p>
        <p>Time: {{ \Carbon\Carbon::parse($wedding_date_time)->format('g:i A') }}</p>
    </div>
</div>