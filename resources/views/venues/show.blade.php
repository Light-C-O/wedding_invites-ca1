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
            <div class=" bg-[#adb2a5] dark:bg-[#6a6e63] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-2 text-grey-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">Venue Details:</h3>
                        <!-- Display detailed information about the venue using the venue-details component -->
                        <x-venue-details :venue=$venue
                            :title="$venue->title"
                            :image="$venue->image"
                            :price="$venue->price"
                            :location="$venue->location"
                            :capacity="$venue->capacity"
                            :description="$venue->description"
                        />

                        <h2>Weddings at {{ $venue->title }}</h2>
                            @if($venue->weddings && $venue->weddings->count() > 0)
                                <ul class="list-group">
                                    @foreach($venue->weddings as $wedding)
                                    <a href="{{route('weddings.show', $wedding) }}" class="m-3">
                                        <!-- making a card to show the information -->
                                        <x-wedding-card
                                            :bride_name="$wedding->bride_name"
                                            :groom_name="$wedding->groom_name"
                                            :wedding_date_time="$wedding->wedding_date_time"
                                            :venue_id="$venue->id"
                                        /> 
                                    </a>
                                    @endforeach
                                </ul>
                            @else
                                <p>No weddings booked at this venue yet.</p>
                            @endif
                        <!-- <div class = "grid grid-cols-3">
                            @foreach ($weddings as $wedding)
                                @if($wedding->venue_id === $venue->id)
                                    <a href="{{route('weddings.show', $wedding) }}" class="m-3">
                                        making a card to show the information -->

                                        <!-- <x-wedding-card
                                            :bride_name="$wedding->bride_name"
                                            :groom_name="$wedding->groom_name"
                                            :wedding_date_time="$wedding->wedding_date_time"
                                            :venue_id="$venue_id"
                                        />
                                    </a> -->
                                <!-- @endif -->
                            <!-- @endforeach -->
                        <!-- </div> -->

                        <div>
                        <!-- Back to venues index button -->
                        <a href="{{ route('venues.index') }}" class="bg-blue-500 hover:bg-blue-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-600 rounded transition ease-in-out duration-150">Back to Venues</a>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>