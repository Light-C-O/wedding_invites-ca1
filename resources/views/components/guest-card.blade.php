@props(['first_name', 'last_name', 'plus1', 'email', 'venues', 'guest'])

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Story+Script&display=swap" rel="stylesheet">
</head>

<!-- Guest Card Component -->
<div class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 dark:border-[#7c7467] hover:shadow-lg transition duration-300">
    <!-- Guest Names -->
    <h4 class="text-center font-bold text-lg">{{ $first_name }} {{ $last_name }}</h4>
    <h4 class="text-center font-bold text-lg">
        @if($plus1)
            Plus One: {{ $plus1 }}
        @else
            <span class="italic text-gray-300">-No Plus1-</span>
        @endif
    </h4>

    <p class=" text-center font-light border-3 border-b-gray-200" style="font-family:Story Script">
        Guest at: 
        <p>    
            @php
                // find the selected wedding via pivot and get its venue (null-safe)
                $selectedWedding = $guest->weddings->firstWhere('pivot.selected', true);
                $selectedVenue = $selectedWedding?->venue;
            @endphp

            @if($selectedVenue)
                {{ $selectedVenue->title }}
            @else
                @forelse($guest->venues as $venue)
                    {{ $venue->title }}{{ !$loop->last ? ', ' : '' }}
                @empty
                    None
                @endforelse
            @endif
        </p>
    </p>

</div>