@props(['first_name', 'last_name', 'plus1', 'email', 'venues', 'wedding'])

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Story+Script&display=swap" rel="stylesheet">
</head>

<!-- Guest Card Component -->
<div class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 bg-white dark:border-[#7c7467] hover:shadow-lg transition duration-300">
    <p class=" text-center font-light border-3 border-b-gray-200" style="font-family:Story Script">
        Guest at: {{ $venues ?: 'Unknown Venue' }}
    </p>

    <!-- Guest Names -->
    <h4 class="text-center font-bold text-lg">
        {{ $first_name }} {{ $last_name }}
        @if($plus1)
            &amp; {{ $plus1 }}
        @endif
    </h4>
    <!-- Wedding date and time for guest -->
    @if($wedding)
    <div class="flex justify-between mt-4 text-gray-700 dark:text-gray-300">
        <p>Date: {{ \Carbon\Carbon::parse($wedding->wedding_date_time)->format('F j, Y') }}</p>
        <p>Time: {{ \Carbon\Carbon::parse($wedding->wedding_date_time)->format('g:i A') }}</p>
    </div>
    @endif
</div>