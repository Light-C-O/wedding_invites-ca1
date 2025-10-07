<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ _('All Venues')}}
        </h2>
    </x-slot>

    <x-alert-success>
        {{session('success') }}
    </x-alert-success>

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

                        <!-- Edit and delete button -->
                        <div class="mt-4 flex space-x-2">
                            <!-- Edit button -->
                            <a href= "{{ route('venues.edit', $venue) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('venues.destroy', $venue) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this venue?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
