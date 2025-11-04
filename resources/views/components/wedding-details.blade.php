@props(['bride_name', 'groom_name', 'location', 'wedding_date_time'])

<?php
//pull location from the venue table
use App\Models\Venue;
$venues = Venue::find($wedding->venue_id);
?>

<!-- Wedding Detail -->
<div  iv class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300  mx-auto"> <!-- Limit the overall container width to make the component more compact -->

    <!-- Wedding Title -->
    <h1 class="font-bold text-black-600 dark:text-gray-100 mb-2" style="font-size: 3rem;">{{$bride_name}} and {{groom_name}};s Wedding</h1> <!-- Heading with larger text and color -->
    <!-- end title -->
    
    <!-- Wedding Info -->
    <div class="flex items-center gap-6">
        
        <div class="flex-1">
            <!-- Wedding Price -->
                <h2 class="text-gray-900 dark:text-gray-100 text-sm mb-4 underline decoration-solid" style="font-size: 1.5rem;">Price: €{{ $price }}</h2>
            <!-- end price -->

            <!-- Wedding Image -->
                <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
                    <!-- Image is further restricted to a smaller size -->
                    <img src="{{ asset('images/venues/' . $image) }}" alt="{{ $title }}" class="w-full max-w-xl h-auto object-cover"> <!-- Restrict image to max-w-xs (20rem) and ensure responsiveness -->
                </div>
            <!-- end image -->
        </div>

        <!-- Content -->
        <div class="flex-1">

            <div class="mb-4">
                <!-- Wedding Description -->
                    <h3 class="text-gray-800 dark:text-gray-100 font-semibold mb-2" style="font-size: 2rem;">Why here?</h3> <!-- Subheading for description -->
                    <p class="text-gray-700 dark:text-gray-100 leading-relaxed">{{ $description }}</p> <!-- Text is spaced out for readability -->
                <!-- end description -->
            </div>
            <!-- Locstion & Price -->
            <div class="text-gray-500 dark:text-gray-100 text-base font-bold mb-4 italic">
                <!-- Wedding Location -->
                    <!-- Emphasizing location with italics and smaller text -->
                    <h2>Location: {{ $location }}</h2>
                <!-- end location -->

                <!-- Wedding Capacity -->
                    <!-- Emphasizing capacity with italics and smaller text -->
                    <h2>Capacity: {{ $capacity }} people</h2>
                <!-- end capacity -->
            </div>
        </div>
    </div>
    <!-- end info -->
</div