<x-app-layout>
    <x-slot name="header" class="bg-[#e5e7e9] dark:bg[#9c9899]">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ _('All Venues')}}
        </h2>
    </x-slot>

    <x-alert-success>
        {{session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#adb2a5] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Venues:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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
