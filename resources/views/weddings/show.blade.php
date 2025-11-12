<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            {{ _('Show Wedding')}}
        </h2>
    </x-slot>

    <x-alert-success>
        <!-- Display success message if available -->
        {{session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-[#adb2a5] dark:bg-[#6a6e63] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pb-2 text-grey-900 dark:text-gray-100">
                    <div class="flex justify-between font-semibold mb-4">
                        <h3 class="text-lg content-center">Wedding Details:</h3>
                        <!-- Back to weddings index button -->
                        <a href="{{ route('weddings.index') }}" class="inline-block border border-2 border-gray-100 dark:border-gray-300 px-2 py-1 rounded bg-gray-100 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 uppercase" :active="request()->routeIs('weddings.create')">All Weddings</a>
                    </div>
                        <!-- Display detailed information about the wedding using the wedding-details component -->
                        <x-wedding-details
                            :bride_name="$wedding->bride_name"
                            :groom_name="$wedding->groom_name"
                            :venue_id="$wedding->venue_id"
                            :best_man="$wedding->best_man"
                            :maid_of_honor="$wedding->maid_of_honor"
                            :wedding_date_time="$wedding->wedding_date_time"
                        />
                        <div>
                        @if (Auth::check() && Auth::user()->role !== 'user')
                            <!-- Edit and delete button -->
                            <div class="flex space-x-2 place-content-center">
                                <!-- Edit button to got to the weddings.edit -->
                                <a href= "{{ route('weddings.edit', $wedding) }}" class="bg-green-500
                                hover:bg-green-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-600 rounded transition ease-in-out duration-150">Edit</a>

                                <!-- Delete button -->
                                <form action="{{ route('weddings.destroy', $wedding) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this wedding?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-[#987e82] hover:bg-[#9f9798] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#6a585b] hover:border-[#585e5f] rounded transition ease-in-out duration-150">Delete</button>
                                </form>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
