<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-grey-800 dark:text-gray-100 leading-tight text-center">
            <!-- Header for the Edit page -->
            {{ _('Edit Section')}}

        </h2>

    </x-slot>

    <!--  -->
    <div class="py-12 ">
        <!-- Guest Modification Form Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-[#f8f5ed] dark:bg-[#aeaeae] overflow dark:border border-gray-900 shadow-sm sm:rounded-lg p-6 max-w-5xl mx-auto">
                <div class="p-6 text-grey-900">
                    <!-- Form to edit a guest -->
                    <h3 class="font-semibold text-lg mb-5">Edit Guest:</h3>
                        <!-- This lets users update (edit) a venue. It sends the updated info using a PUT request to the correct URL for that specific venue. -->
                        <x-guest-form
                            :action="route('guests.update', $guest)"
                            :method="'PUT'"
                            :guest="$guest"
                            :venues="$venues"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>