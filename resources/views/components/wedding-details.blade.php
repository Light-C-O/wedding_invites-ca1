@props(['bride_name', 'groom_name', 'venue_id', 'maid_of_honor', 'best_man', 'wedding_date_time'])

@php
    use App\Models\Venue;
    $venue = Venue::find($venue_id);
@endphp

<!-- Wedding Detail -->
<div  iv class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300  mx-auto"> <!-- Limit the overall container width to make the component more compact -->

    <!-- Wedding bride and groom -->
    <h1 class=" text-center font-bold text-black dark:text-gray-100 mb-2" style="font-size: 2rem;">{{$bride_name}} and {{$groom_name}}'s Wedding</h1> <!-- Heading with larger text and color -->
    <!-- end weding b&g -->
    
    <!-- Wedding Info -->

        
        <div class="flex-1 ">
            <h2 class="text-center underline decoration-solid" style="font-size: 1.5rem">Special Guest(s):</h2>
            <!-- Wedding bestman -->
                    <p class="text-center text-gray-900 dark:text-gray-100"> Best Man: <span class="font-semibold">{{$best_man ? $best_man : '-Not Set-'}}</span></p>
            <!-- end bm -->

            <!-- Wedding maid of honour -->
                    <p class="text-center text-gray-900 dark:text-gray-100">Maid of Honour: <span class="font-semibold">{{$maid_of_honor ? $maid_of_honor : '-Not Set-'}}</span></p>
            <!-- end moh -->
        </div>

        <!-- Content -->
        <div class="flex-1">

            <div class="mb-4">
                <!-- Wedding Description -->
                    <h3 class="text-gray-800 dark:text-gray-100 font-semibold mb-2" style="font-size: 2rem;">Come with us!</h3> <!-- Subheading for description -->
                    <p class="text-gray-700 dark:text-gray-100 leading-relaxed">We’ve found a love that lasts a lifetime,and we can’t wait to share this special moment with you. <br>
                    Please join us as we, {{$bride_name}} and {{$groom_name}}, celebrate our wedding on 
                    {{ \Carbon\Carbon::parse($wedding_date_time)->format('F j, Y') }} at 
                    {{ \Carbon\Carbon::parse($wedding_date_time)->format('g:i A') }}.<br>
                    Your love and presence mean the world to us at {{$venue ? $venue->title : 'Unknown Venue'}}.
                    </p>
                <!-- end description -->
            </div>
            <!-- Location & Guests -->
            <div class="text-gray-500 dark:text-gray-100 text-base font-bold mb-4 italic">
                <!-- Wedding Location -->
                    <!-- Pulled the location from Venue table -->
                    <h2>Location: {{ $venue->location }}</h2>
                <!-- end location -->

                <!-- Wedding Capacity -->
                    <!-- No. of current guests-->
                        <!-- <h2 class="text-gray-500 dark:text-gray-100 text-base font-bold italic">Total guests for all weddings: {{ $venue->weddings->sum('guest_count') }} of {{ $venue->capacity}} -->
                <!-- end capacity -->
            </div>
        </div>

    <!-- end info -->
</div