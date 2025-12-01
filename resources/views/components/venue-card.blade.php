@props(['title', 'image'])
<!-- Venue Card Component -->
<div class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 dark:border-[#7c7467] hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$title}}</h4>
    <img class="h-259 w-full object-fill" src="{{asset('images/venues/' . $image)}}" alt="{{$title}}">
</div>