<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-grey-800 dark:text-gray-100 leading-tight text-center">
            <!-- Header for the Create New Venues page -->
            {{ _('Create New Venues')}}

        </h2>

    </x-slot>

    <!--  -->
    <div class="py-12">
        <!-- Venue Creation Form Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Back button to the dashboard -->
            <div class="flex text-gray-900 font-semibold uppercase underline underline-offset-8 dark:text-gray-100 mb-5 place-content-end mr-20" >
                <a href="{{ route('dashboard') }}" class="inline-block px-2 py-1 hover:bg-stone-200 rounded dark:hover:bg-stone-500" :active="request()->routeIs('dashboard')">
                {{ __('Back to Home') }}</a>
            </div>
            <div class=" bg-[#f8f5ed] dark:bg-[#aeaeae] overflow dark:border border-gray-900 shadow-sm sm:rounded-lg p-6 max-w-5xl mx-auto">
                <div class="p-6 text-grey-900">
                    <!-- Form to create a new venue -->
                    <h3 class="font-semibold text-lg mb-4">Add a New Venue:</h3>
                        <x-venue-form
                            :action="route('venues.store')"
                            :method="'POST'"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
