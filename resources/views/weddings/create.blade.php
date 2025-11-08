<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-grey-800 dark:text-gray-100 leading-tight text-center">
            <!-- Header for the Create New Weddings page -->
            {{ _('Create New Weddings')}}

        </h2>

    </x-slot>

    <!--  -->
    <div class="py-12 ">
        <!-- Wedding Creation Form Section -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-[#f8f5ed] dark:bg-[#aeaeae] overflow dark:border border-gray-900 shadow-sm sm:rounded-lg p-6 max-w-5xl mx-auto">
                <div class="p-6 text-grey-900">
                    <!-- Form to create a new wedding -->
                    <h3 class="font-semibold text-lg mb-5">Add a New Wedding:</h3>
                        <x-wedding-form
                            :action="route('weddings.store')"
                            :method="'POST'"
                            :wedding="$wedding"
                            :venues="$venues"
                        />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>