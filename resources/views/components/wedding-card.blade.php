@props(['bride_name', 'groom_name', 'location', 'wedding_date_time'])

<?php
//pull location from the venue table
use App\Models\Venue;
$venues = Venue::find($wedding->venue_id);
?>

<!-- Wedding Card Component -->
<div class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 bg-white dark:border-[#7c7467] hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$bride_name}} and {{groom_name}}</h4>
    <p class="text-gray-700 dark:text-gray-300 mt-2">Location: {{$venue->location}}</p>
    <p class="text-gray-700 dark:text-gray-300 mt-2">Wedding Date & Time: {{$wedding_date_time}}</p>
</div>