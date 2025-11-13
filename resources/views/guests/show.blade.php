<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-100 leading-tight text-center">
            {{ _('Show Guest')}}
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
                    <h3 class="font-semibold text-lg mb-4">Guest Details:</h3>
                    <!-- Display detailed information about the guest using the guest-details component -->
                    <x-guest-details
                        :first_name="$guest->first_name"
                        :last_name="$guest->last_name"
                        :venues="$guest->venues"
                        :weddings="$guest->venues->pluck('weddings')->flatten()"
                        :plus1="$guest->plus1"
                        :email="$guest->email"
                        :guest="$guest"
                    />
                    <div>
                    <!-- Back to guests index button -->
                    <a href="{{ route('guests.index') }}" class="bg-blue-500 hover:bg-blue-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-600 rounded transition ease-in-out duration-150">Back to Guests</a>
                    </div>
                    <!-- Edit and delete button of guest-->
                    <div class="flex space-x-2 place-content-center">
                        <!-- Edit button to got to the guests.edit -->
                        <a href= "{{ route('guests.edit', $guest) }}" class="bg-green-500
                        hover:bg-green-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-600 rounded transition ease-in-out duration-150">Edit the Guest</a>

                        <!-- Delete button -->
                        <form action="{{ route('guests.destroy', $guest) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this guest?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#987e82] hover:bg-[#9f9798] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#6a585b] hover:border-[#585e5f] rounded transition ease-in-out duration-150">Delete the guest</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
