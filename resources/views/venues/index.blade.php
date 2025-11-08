<x-app-layout>
    <x-slot name="header" class="bg-[#e5e7e9] dark:bg[#9c9899]">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            <!-- Header for the All Venues page -->
            {{ _('All Venues')}}
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
                    {{ __('Back to Dashboard') }}</a>
                </div>
            <div class="bg-[#adb2a5] dark:bg-[#6a6e63] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <h3 class="font-semibold text-lg">List of Venues:</h3>
                        @if (auth()->user()->role === 'admin')
                            <div class="flex justify-end text-gray-900 font-semibold uppercase dark:text-gray-100" >
                                <a href="{{ route('venues.create') }}" class="inline-block border border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600" :active="request()->routeIs('venues.create')">
                                {{ __('Create Venues') }}</a>
                            </div>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-5 mt-5">
                        <!-- Loop through each venue and display it using the venue-card component -->
                        @foreach($venues as $venue)
                                <a href="{{ route('venues.show', $venue) }}">
                                    <x-venue-card
                                        :title="$venue->title"
                                        :image="$venue->image"
                                    />
                                </a>
                        @endforeach
                    </div>
                    @if (auth()->user()->role === 'admin')
                        <div class="flex justify-end text-gray-900 font-semibold uppercase dark:text-gray-100" >
                            <a href="{{ route('venues.create') }}" class="inline-block border border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600" :active="request()->routeIs('venues.create')">
                            {{ __('Create Venues') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
