@props(['title', 'location', 'capacity', 'price', 'image', 'description', 'venue'])

<!-- Venue Detail -->
<div  iv class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 mx-auto max-w-7xl"> <!-- Limit the overall container width to make the component more compact -->

    <!-- Venue Title -->
    <h1 class="font-bold text-black dark:text-gray-100 mb-2 text-2xl md:text-3xl lg:text-5xl">{{ $title }}</h1> <!-- Heading with larger text and color -->
    <!-- end title -->
    
    <!-- Venue Info -->
    <div class="flex flex-col lg:flex-row items-center gap-6">
        <div class="flex-1">
            <!-- Venue Price -->
                <h2 class="text-gray-900 dark:text-gray-100 text-sm mb-4 underline decoration-solid sm:text-lg md:text-xl">Price: €{{ $price }}</h2>
            <!-- end price -->

            <!-- Venue Image -->
                <div class="overflow-hidden rounded-lg mb-4 flex justify-center">
                    <!-- Image is further restricted to a smaller size -->
                    <img src="{{ asset('images/venues/' . $image) }}" alt="{{ $title }}" class="w-full max-w-xl h-auto object-cover"> <!-- Restrict image to max-w-xs (20rem) and ensure responsiveness -->
                </div>
            <!-- end image -->
        </div>

        <!-- Content -->
        <div class="flex-1">

            <div class="mb-4">
                <!-- Venue Description -->
                    <h3 class="text-gray-800 dark:text-gray-100 font-semibold mb-2 text-xl sm:text-2xl md:text-3xl">Why here?</h3> <!-- Subheading for description -->
                    <p class="text-gray-700 dark:text-gray-100 leading-relaxed">{{ $description }}</p> <!-- Text is spaced out for readability -->
                <!-- end description -->
            </div>
            <!-- Location, Capacity & Weddings -->
            <div class="text-gray-500 dark:text-gray-100 text-base font-bold mb-4 italic">
                <!-- Venue Location -->
                    <!-- Emphasizing location with italics and smaller text -->
                    <h2>Location: {{ $location }}</h2>
                <!-- end location -->

                <!-- Venue Capacity -->
                    <!-- Emphasizing capacity with italics and smaller text -->
                    <h2>Capacity: {{ $capacity }} people</h2>
                <!-- end capacity -->

                <!--No. of weddings-->
                    <div class="text-end">
                        <!-- Display the number of weddings booked for this venue -->
                            <h2 class="text-gray-900 dark:text-gray-100 text-base font-bold italic">Currently booked for {{ $venue->weddings->count() }} wedding(s)</h2>
                    </div>
                <!-- end no. weds -->
            </div>
        </div>
    </div>
    <!-- end info -->
</div