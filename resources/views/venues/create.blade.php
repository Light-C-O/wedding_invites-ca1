<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ _('Create New Venues')}}

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#f8f5ed] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
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
