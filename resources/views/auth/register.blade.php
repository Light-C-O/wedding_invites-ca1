<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Go Back -->
        <a href="{{ url('/login') }}" class="text-base inline-block py-2 mb-2 hover:font-bold rounded-sm text-base leading-normal dark:text-white hover:underline underline-offset-8 decoration-2">&#11160; Go Back </a>

        <!-- Name -->
        <div>
            <x-input-label class="dark:text-white" for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full dark:bg-zinc-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="dark:text-white" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full dark:bg-zinc-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="dark:text-white" for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full dark:bg-zinc-300"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="dark:text-white" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full dark:bg-zinc-300"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label class="dark:text-white" for="role" :value="__('Register as')" />
            <select name="role" id="role" class="block mt-1 w-full border-gray-300 text-gray-900 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:ring-1 dark:bg-zinc-300">
                <!--  Options for role selection -->
                <!--If the old input for role is 'user', it prints selected; otherwise, it prints nothing.-->
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <!--  Only select 'admin' if you want to register as an administrator -->
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 gap-6">
            <a class="underline text-base text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:text-gray-100 dark:hover:font-semibold" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
