<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">
            {{ _('All Venues')}}

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-[#adb2a5] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-grey-900">
                    <h3 class="font-semibold text-lg mb-4">Venue Details:</h3>
                        <!-- Display detailed information about the venue using the venue-details component -->
                        <x-venue-details
                            :title="$venue->title"
                            :image="$venue->image"
                            :price="$venue->price"
                            :location="$venue->location"
                            :capacity="$venue->capacity"
                            :description="$venue->description"
                        />
                        <!-- Edit and delete button -->
                        <div class=" mt-4 flex space-x-2 place-content-center">
                            <!-- Edit button to got to the venues.edit -->
                            <a href= "{{ route('venues.edit', $venue) }}" class="bg-green-500
                            hover:bg-green-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-600 rounded transition ease-in-out duration-150">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('venues.destroy', $venue) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this venue?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-[#987e82] hover:bg-[#9f9798] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#6a585b] hover:border-[#585e5f] rounded transition ease-in-out duration-150">Delete</button>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>