<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#d1cec6] dark:bg-[#a6a39c]">
        <div class=" bg-[#d1cec6] dark:bg-[#a6a39c] max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-[#7c7467] overflow-hidden shadow-sm sm:rounded-lg">
                <!--  Admin and User Dashboard Message-->
                @if (Auth::check() && Auth::user()->role == 'user')
                    <div class="text-center p-6 text-gray-900 dark:text-gray-100 ">
                        {{ __("You're logged in as User!") }}
                    </div>
                @else
                    <div class="text-center p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as Admin!") }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
