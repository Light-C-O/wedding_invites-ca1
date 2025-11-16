<?php
use App\Models\Venue;
$venue = Venue::all();
use App\Models\Wedding;
$wedding = Wedding::all();
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            {{ _('Show Guest')}}
        </h2>
    </x-slot>

    <x-alert-success>
        <!-- Display success message if available -->
        {{session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <!-- Back button to the dashboard -->
            <div class="flex text-gray-900 font-semibold flex justify-between uppercase dark:text-gray-100 mb-2 " >
                <!-- Back to venues index button -->
                <a href="{{ route('guests.index') }}" class="inline-block border border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600">Back to Guests</a>
                <a href="{{ route('dashboard') }}" class="inline-block px-2 py-1 hover:bg-stone-200 rounded dark:hover:bg-stone-500 underline underline-offset-8" :active="request()->routeIs('dashboard')">
                {{ __('Back to Home') }}</a>
            </div>
            <div class=" bg-[#adb2a5] dark:bg-[#6a6e63] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pt-2 pb-2 text-grey-900 dark:text-gray-100">
                    <div class="text-center">
                        <h3 class="text-xl content-center font-semibold">Guest Details:</h3>
                    </div>
                </div>
                
                <div class="p-6 pt-0">
                    <!-- Display detailed information about the guest using the guest-details component -->
                    <x-guest-details
                        :first_name="$guest->first_name"
                        :last_name="$guest->last_name"
                        :plus1="$guest->plus1"
                        :email="$guest->email"

                    />

                    <!-- Edit and delete button of guest-->
                    <div class="flex space-x-2 place-content-center">
                        <!-- Edit button to got to the guests.edit -->
                        <a href= "{{ route('guests.edit', $guest) }}" class="bg-green-500 hover:bg-green-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-600 rounded transition ease-in-out duration-150">Edit Guest</a>

                        <!-- Delete button -->
                        <form action="{{ route('guests.destroy', $guest) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this guest?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#987e82] hover:bg-[#9f9798] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#6a585b] hover:border-[#585e5f] rounded transition ease-in-out duration-150">Delete guest</button>
                        </form>
                    </div>
                </div>

                @if($selectedWedding && $selectedVenue)
                    <div class="p-4 m-5 text-gray-700 dark:text-gray-800 bg-white border rounded-lg border-[#adb2a5] border-5 dark:bg-[#adb2a5]">You saved a date for <strong>{{ $selectedWedding->bride_name }} & {{ $selectedWedding->groom_name }}</strong> at <strong>{{ $selectedVenue->title }}</strong> on <strong>{{ $selectedWedding->wedding_date_time->format('F j, Y, g:i A') }}</strong>! 🎉
                    </div>
                @endif
                
                <x-guest-invite
                    :venues="$guest->venues"
                    :weddings="$guest->venues->pluck('weddings')->flatten()"
                    :guest="$guest"
                    :plus1="$guest->plus1"
                    :first_name="$guest->first_name"
                    :last_name="$guest->last_name"
                />
            </div>
        </div>
    </div>
</x-app-layout>
