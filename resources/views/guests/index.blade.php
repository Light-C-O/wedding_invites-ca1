<x-app-layout>
    <x-slot name="header" class="bg-[#e5e7e9] dark:bg[#9c9899]">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            <!-- Header for the All Guests page -->
            {{ _('All Guests')}}
        </h2>
    </x-slot>

    <x-alert-success>
        <!-- Display success message if available -->
        {{session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Back button to the dashboard -->
                <div class="flex text-gray-900 font-semibold uppercase underline underline-offset-8 dark:text-gray-100 mb-5 " >
                    <a href="{{ route('dashboard') }}" class="inline-block px-2 py-1 hover:bg-stone-200 rounded dark:hover:bg-stone-500" :active="request()->routeIs('dashboard')">
                    {{ __('Back to Home') }}</a>
                </div>
            <div class="bg-[#adb2a5] dark:bg-[#6a6e63] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between font-semibold mb-4">
                        <h3 class="text-lg content-center">List of Guests:</h3>
                        <div class="uppercase" >
                            <a href="{{ route('guests.create') }}" class="inline-block border border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600" :active="request()->routeIs('guests.create')">
                            {{ __('Create Guests') }}</a>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-5">
                        <!-- Loop through each guest and display it using the guest-card component -->
                        
                        @foreach($guests as $guest)
                                <a href="{{ route('guests.show', $guest) }}">
                                    <x-guest-card
                                        :first_name="$guest->first_name"
                                        :last_name="$guest->last_name"
                                        :venues="$guest->venues"
                                        :plus1="$guest->plus1"
                                    />
                                </a>
                        @endforeach
                    </div>
                    <div class="flex justify-end text-gray-900 font-semibold uppercase dark:text-gray-100" >
                        <a href="{{ route('guests.create') }}" class="inline-block border border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600" :active="request()->routeIs('guests.create')">
                        {{ __('Create Guests') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
