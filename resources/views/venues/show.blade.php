<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ _('All Venues')}}

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4">Venue Details:</h3>
                        <x-venue-details
                            :title="$venue->title"
                            :image="$venue->image"
                            :price="$venue->price"
                            :location="$venue->location"
                            :capacity="$venue->capacity"
                            :description="$venue->description"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>