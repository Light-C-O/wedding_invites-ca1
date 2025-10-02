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
                    <h3 class="font-semibold text-lg mb-4">List of Venues:</h3>
                    <div class="grid grid-cols-1 sm:frid-2 lg:grid-cols-3 gap-6">
                        @foreach($venues as $venue)
                        <a href="{{ route('venues.show', $venue) }}">
                            <x-venue-card
                                :title="$venue->title"
                                :image="$venue->image"
                            />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
