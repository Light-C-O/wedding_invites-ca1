<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#d1cec6] dark:bg-[#a6a39c]">
        <div class="bg-[#d1cec6] dark:bg-[#a6a39c] max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#7c7467] overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <!--  Admin and User Dashboard Message-->
                @if (Auth::check() && Auth::user()->role == 'user')
                    <div class="text-center p-6 text-gray-900 dark:text-gray-100 ">
                        {{ __("You're logged in as User!") }}
                    </div>
                @else
                    <div class="text-center p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as Admin!") }}
                    </div>
                @endif
            </div>

            <div class="flex justify-center gap-5">
                <!-- Venues -->
                <div class="justify-center bg-white dark:bg-[#7c7467] overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-500 p-6">
                    <a href="{{ route('venues.index') }}" class="inline-block text-center uppercase font-bold text-gray-900 dark:text-gray-100" >
                        {{ __('Venues') }}
                        <img src="\images\venue_logo_dashboard.png" class="dark:invert w-64 h-auto mt-5" alt="venue_dashboard">
                    </a>
                </div>

                <!-- Weddings -->
                <div class="justify-center bg-white dark:bg-[#7c7467] overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-500 p-6">
                    <a href="{{ route('weddings.index') }}" class="inline-block text-center uppercase font-bold text-gray-900 dark:text-gray-100" >
                        {{ __('Weddings') }}
                        <img src="\images\wedding_logo_dashboard.png" class="dark:invert w-64 h-auto mt-5" alt="wedding_dashboard">
                    </a>
                </div>

                <!-- Guest -->
                <div class="justify-center bg-white dark:bg-[#7c7467] overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-100 dark:hover:bg-zinc-500 p-6">
                    <a href="{{ route('weddings.index') }}" class="inline-block text-center uppercase font-bold text-gray-900 dark:text-gray-100" >
                        {{ __('Guests') }}
                        <img src="\images\guest_logo_dashboard.png" class="dark:invert w-64 h-auto mt-5" alt="guests_dashboard">
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
