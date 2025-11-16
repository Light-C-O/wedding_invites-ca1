@props(['action', 'method', 'guest' => null])
<form 
    action="{{ $action }}" 
    method="POST"
    data-persist="true"
    data-storage-prefix="{{ $guest ? 'edit_guest_' . $guest->id : 'create_guest_' }}">
    
    <!-- It's required in every Laravel form -->
    @csrf
    <!-- HTML forms don’t support PUT/PATCH, so Laravel uses this trick. -->
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Section -->
    <div class="lg:justify-center flex flex-wrap gap-8 mb-5">
        <!-- Fisrt and last -->
        <div class="">
            <!-- Fist name of guest -->
            <div class="mb-4">
                <label for="first_name" class="block text-sm text-gray-700">Fist Name</label>
                <!-- This says that 'first_name' is required. If form is being reloaded (like after a validation error), it shows the previous input (old('first_name')). Otherwise, it shows the guest's current first_name (if you'rer editing). If there is no value, it is blank. -->
                <input
                type="text"
                name="first_name"
                id="first_name"
                value="{{ old('first_name', $guest->first_name ?? '') }}"
                required
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <!-- If there is a error for the first_name, this shows the error message in red, stating that is not valid. -->
                @error('first_name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last name of guest -->
            <div class="mb-4">
                <label for="last_name" class="block text-sm text-gray-700">Last Name</label>
                <!-- This says that 'last_name' is required. If form is being reloaded (like after a validation error), it shows the previous input (old('last_name')). Otherwise, it shows the guest's current last_name (if you'rer editing). If there is no value, it is blank. -->
                <input
                type="text"
                name="last_name"
                id="last_name"
                value="{{ old('last_name', $guest->last_name ?? '') }}"
                required
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <!-- If there is a error for the last_name, this shows the error message in red, stating that is not valid. -->
                @error('last_name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- email and plus1 -->
        <div class="">
            <!-- email -->
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-700">Email</label>
                <!-- Similar to last_name, it checks for old input or existing guest email -->
                <input
                type="text"
                name="email"
                id="email"
                value="{{ old('email', $guest->email ?? '') }}"
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- plus1 -->
            <div class="mb-4">
                <label for="plus1" class="block text-sm text-gray-700">Plus One</label>
                <!-- Similar to email, it checks for old input or existing guest maid_of_honor -->
                <input
                type="text"
                name="plus1"
                id="plus1"
                value="{{ old('plus1', $guest->plus1 ?? '') }}"
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>
        </div>
    </div>

    <!-- Option to add, cancel or update -->
    <div>
        <!-- If you're editing a guest,($guest is set) the button says 'Update Guest' otherwise, 'Add Guest' since you are creating one  -->
        <!-- simplified the logic -->
        <x-primary-button class="gap-4">
            {{ $guest ? 'Update Guest' : 'Add Guest' }}
        </x-primary-button>

        <!-- Cancel button - an if statement is made to see if the guest exits(edit section) or not (create section) and redirect to the right place-->
        <a href="{{ $guest && $guest->exists ? route('guests.show', $guest->id) : route('guests.index') }}"
        class="text-base inline-flex items-center bg-[#aebb98] hover:bg-[#aeb8be] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#959c88] hover:border-[#7e8f9b] rounded transition ease-in-out duration-150">Cancel</a>
    </div>
</form>