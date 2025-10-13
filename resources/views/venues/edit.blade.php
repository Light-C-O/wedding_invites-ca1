<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ _('Edit Section')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
