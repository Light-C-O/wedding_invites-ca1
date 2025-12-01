<?php
use App\Models\Wedding;
$wedding = Wedding::all();

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            {{ _('Show Venue')}}
        </h2>
    </x-slot>

    <x-alert-success>
        <!-- Display success message if available -->
        {{session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back button to the dashboard -->
            <div class="flex text-gray-900 font-semibold justify-between uppercase dark:text-gray-100 mb-2 " >
                <!-- Back to venues index button -->
                <a href="{{ route('venues.index') }}" class="inline-block border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600">Back to Venues</a>
                <a href="{{ route('dashboard') }}" class="inline-block px-2 py-1 hover:bg-stone-200 rounded dark:hover:bg-stone-500 underline underline-offset-8" :active="request()->routeIs('dashboard')">
                {{ __('Back to Home') }}</a>
            </div>
            <div class=" bg-[#adb2a5] dark:bg-[#6a6e63] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pt-2 pb-2 text-grey-900 dark:text-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl content-center font-semibold">Venue Details:</h3>
                    </div>
                </div>
                    
                <!-- Display detailed information about the venue using the venue-details component -->
                <x-venue-details 
                    :venue="$venue"
                    :title="$venue->title"
                    :image="$venue->image"
                    :price="$venue->price"
                    :location="$venue->location"
                    :capacity="$venue->capacity"
                    :description="$venue->description"
                />
                
                @if (Auth::check() && Auth::user()->role !== 'user')
                    <!-- Edit and delete button -->
                    <div class="flex space-x-2 place-content-center">
                        <!-- Edit button to got to the venues.edit -->
                        <a href= "{{ route('venues.edit', $venue) }}" class="bg-green-500
                        hover:bg-green-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-600 rounded transition ease-in-out duration-150">Edit</a>

                        <!-- Delete button -->
                        <form action="{{ route('venues.destroy', $venue) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this venue?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#987e82] hover:bg-[#9f9798] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#6a585b] hover:border-[#585e5f] rounded transition ease-in-out duration-150">Delete</button>
                        </form>
                    </div>
                @endif

                <!-- For the wedding list -->
                <div class = "mt-5">
                    <h2 class="font-bold uppercase text-lg underline decoration-double">List of weddings at {{ $venue->title }}:</h2>
                        @if($venue->weddings && $venue->weddings->count() > 0)
                            <ul class="list-group flex">
                                @foreach($venue->weddings as $wedding)
                                    <div class=" flex justify-between items-start m-3 mt-2 relative">
                                        <!-- save button -->
                                        @auth
                                            @if(Auth::user()->guest)
                                                <form action="{{route('guests.attachWedding', Auth::user()->guest)}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="wedding_id" value="{{$wedding->id}}">
                        
                                                    <button type="submit" class="absolute top right-0 bg-blue-500 hover:bg-blue-400 text-black font-bold py-2 px-2 border-b-2 border-blue-700 hover:border-blue-600 rounded transition ease-in-out duration-150">Save</button>
                                                </form>


                                                <!-- making a card to show the information -->
                                                <x-wedding-card
                                                    :bride_name="$wedding->bride_name"
                                                    :groom_name="$wedding->groom_name"
                                                    :wedding_date_time="$wedding->wedding_date_time"
                                                    :venue="$venue"
                                                />

                                            @else
                                                <div class="dark:bg-gray-600 dark:rounded lg px-2">
                                                    <span class="text-red-500 dark:text-red-800 dark:font-semibold">No guest profile found. Please create your guest first.</span>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                @endforeach
                            </ul>
                        @else
                            <p>No weddings booked at this venue yet.</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>