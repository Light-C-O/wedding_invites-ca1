@props(['title', 'location', 'capacity', 'price', 'image', 'description'])

<!-- Venue Detail -->
<div  iv class="bg-[#f8f5ed] border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300  mx-auto"> <!-- Limit the overall container width to make the component more compact -->

    <!-- Venue Title -->
    <h1 class="font-bold text-black-600 mb-2" style="font-size: 3rem;">{{ $title }}</h1> <!-- Heading with larger text and color -->
    <!-- end title -->
    
    <!-- Venue Info -->
    <div class="flex items-center gap-6">
        
        <!-- Image -->
        <div class="flex-1">
            <!-- Venue Price -->
                <h2 class="text-gray-900 text-sm mb-4 underline decoration-solid" style="font-size: 1.5rem;">Price: €{{ $price }}</h2>
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
                    <h3 class="text-gray-800 font-semibold mb-2" style="font-size: 2rem;">Why here?</h3> <!-- Subheading for description -->
                    <p class="text-gray-700 leading-relaxed">{{ $description }}</p> <!-- Text is spaced out for readability -->
                <!-- end description -->
            </div>
            <!-- Locstion & Price -->
            <div class="text-gray-500 text-base font-bold mb-4 italic">
                <!-- Venue Location -->
                    <!-- Emphasizing location with italics and smaller text -->
                    <h2>Location: {{ $location }}</h2>
                <!-- end location -->

                <!-- Venue Capacity -->
                    <!-- Emphasizing capacity with italics and smaller text -->
                    <h2>Capacity: {{ $capacity }} people</h2>
                <!-- end capacity -->
            </div>
        </div>
    </div>
    <!-- end info -->
</div