@props(['first_name', 'last_name', 'venue_id', 'email', 'best_man', 'wedding_date_time'])

@php
    use App\Models\Venue;
    $venue = Venue::find($venue_id);

    use App\Models\Wedding;
    $wedding = Wedding::all();
@endphp

<!-- Guest Detail -->
<div  iv class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300  mx-auto"> <!-- Limit the overall container width to make the component more compact -->

    <!-- Guest bride and groom -->
    <h1 class=" text-center font-bold text-black dark:text-gray-100 mb-2" style="font-size: 2rem;">Guest to {{$wedding->bride_name}} and {{$wedding->groom_name}}'s Wedding</h1> <!-- Heading with larger text and color -->
    <!-- end wedding b&g -->
    
    <!-- Guest Info -->
        <div class="flex-1 ">
            <h2 class="text-center underline decoration-solid" style="font-size: 1.5rem">Plus One:</h2>
            <!-- Guest's plus one -->
                    <p class="text-center text-gray-900 dark:text-gray-100"> Name: <span class="font-semibold">{{$plus1 ? $plus1 : '-Not Set-'}}</span></p>
            <!-- end p1 -->
        </div>

        <!-- Content -->
        <div class="flex-1">

            <div class="mb-4">
                <!-- Guest Description -->
                    <h3 class="text-gray-800 dark:text-gray-100 font-semibold mb-2" style="font-size: 2rem;">You Saved a Date!</h3> <!-- Subheading for description -->
                    <p class="text-gray-700 dark:text-gray-100 leading-relaxed">It is with great joy that we invite you, {{$first_name}} {{$last_name}} to witness and celebrate the marriage of {{$wedding->bride_name}} and {{$wedding->groom_name}} at {{$venue ? $venue->title : 'Unknown Venue'}}. Your presence would be a treasured addition to this momentous occasion, as we come together to honor love, commitment, and the beginning of a lifelong journey.</p>
                    
                    <p class="text-gray-700 dark:text-gray-100 leading-relaxed">Please attend on {{ \Carbon\Carbon::parse($wedding->wedding_date_time)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($wedding->wedding_date_time)->format('g:i A') }}.
                    </p>
                <!-- end description -->
            </div>
            <!-- Location & Guests -->
            <div class="text-gray-500 dark:text-gray-100 text-base font-bold mb-4 italic">
                <!-- Guest Location -->
                    <!-- Pulled the location from Venue table -->
                    <h2>Location: {{ $venue->location }}</h2>
                <!-- end location -->

                
                <!-- Optional Email -->
                    <p class="text-center mt-2 text-sm text-gray-600 dark:text-gray-400">Email: {{ $email }}</p>
            </div>
        </div>

    <!-- end info -->
</div




