<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            <!-- Header for the Edit Section page -->
            {{ _('Edit Section')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <!-- Back button to the dashboard -->
            <div class="flex text-gray-900 font-semibold uppercase underline underline-offset-8 dark:text-gray-100 mb-5 " >
                <a href="{{ route('dashboard') }}" class="inline-block px-2 py-1 hover:bg-stone-200 rounded dark:hover:bg-stone-500" :active="request()->routeIs('dashboard')">
                {{ __('Back to Home') }}</a>
            </div>
            <div class="bg-[#f8f5ed] overflow shadow-sm sm:rounded-lg p-6 max-w-5xl mx-auto">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Venue</h3>

                    <!-- This lets users update (edit) a venue. It sends the updated info using a PUT request to the correct URL for that specific venue. -->
                    <x-venue-form
                        :action="route('venues.update', $venue)"
                        :method="'PUT'"
                        :venue="$venue"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
