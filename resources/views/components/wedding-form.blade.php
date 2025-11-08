@props(['action', 'method', 'wedding' => null, 'venues' => []])
<form action="{{ $action }}" method="POST">
    <!-- It's required in every Laravel form -->
    @csrf
    <!-- HTML forms don’t support PUT/PATCH, so Laravel uses this trick. -->
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Section -->
    <div class="lg:justify-center flex flex-wrap gap-8 mb-5">
        <div class="">
            <!-- Bride -->
            <div class="mb-4">
                <label for="bride_name" class="block text-sm text-gray-700">Name of the Bride</label>
                <!-- This says that 'bride_name' is required. If form is being reloaded (like after a validation error), it shows the previous input (old('bride_name')). Otherwise, it shows the wedding's current bride_name (if you'rer editing). If there is no value, it is blank. -->
                <input
                type="text"
                name="bride_name"
                id="bride_name"
                :value="{{ old('bride_name', $wedding->bride_name ?? '') }}"
                required
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <!-- If there is a error for the bride_name, this shows the error message in red, stating that is not valid. -->
                @error('bride_name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Groom -->
            <div class="mb-4">
                <label for="groom_name" class="block text-sm text-gray-700">Name of the Groom</label>
                <!-- This says that 'groom_name' is required. If form is being reloaded (like after a validation error), it shows the previous input (old('groom_name')). Otherwise, it shows the wedding's current groom_name (if you'rer editing). If there is no value, it is blank. -->
                <input
                type="text"
                name="groom_name"
                id="groom_name"
                :value="{{ old('groom_name', $wedding->groom_name ?? '') }}"
                required
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <!-- If there is a error for the groom_name, this shows the error message in red, stating that is not valid. -->
                @error('groom_name')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="">
            <!-- wedding date and time -->
            <div class="mb-4">
                <label for="wedding_date_time" class="block text-sm text-gray-700">Time of the wedding</label>
                <input
                type="datetime-local"
                name="wedding_date_time"
                id="wedding_date_time"
                placeholder="yyyy-mm-dd-hh-mm" 
                value="{{ old('wedding_date_time', $wedding?->wedding_date_time ? $wedding->wedding_date_time->format('Y-m-d\TH:i') : '') }}"
                required 
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                <!-- Throw an error is requiremtns is not met -->
                @error('wedding_date_time')
                <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Choose the venue - dropdown menu -->
            <div class="mb-4">
                <label for="venue_id" class="block text-sm text-gray-700">Venue:</label>
                <select id="venue_id" name="venue_id" class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 cmb-4">
                    <option value="">Please choose venue...</option>
                        <!-- a loop to dispaly an new venue from the Venue::find() if added -->
                        @foreach($venues as $venue)
                            <!-- make an option to shows each new venue title -->
                            <option :value="{{$venue->id}}" {{ old('venue_id', $wedding?->venue_id) == $venue->id ? 'selected' : '' }}> 
                                {{$venue->title}}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>

        <div class="">
            <!-- Best Man -->
            <div class="mb-4">
                <label for="best_man" class="block text-sm text-gray-700">Best Man</label>
                <!-- Similar to groom_name, it checks for old input or existing wedding best_man -->
                <input
                type="text"
                name="best_man"
                id="best_man"
                :value="{{ old('best_man', $wedding->best_man ?? '') }}"
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>

            <!-- Maid of honour -->
            <div class="mb-4">
                <label for="maid_of_honor" class="block text-sm text-gray-700">Maid of Honour</label>
                <!-- Similar to best_man, it checks for old input or existing wedding maid_of_honor -->
                <input
                type="text"
                name="maid_of_honor"
                id="maid_of_honor"
                :value="{{ old('maid_of_honor', $wedding->maid_of_honor ?? '') }}"
                class="mt-1 block w-64 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            </div>
        </div>
    </div>

    <!-- Option to add, cancel or update -->
    <div>
        <!-- If you're editing a wedding,($wedding is set) the button says 'Update Wedding' otherwise, 'Add Wedding' since you are creating one  -->
        <!-- simplified the logic -->
        <x-primary-button class="gap-4">
            {{ $wedding ? 'Update Wedding' : 'Add Wedding' }}
        </x-primary-button>

        <!-- Cancel button - an if statement is made to see if the wedding exits(edit section) or not (create section) and redirect to the right place-->
        <a href="{{ $wedding && $wedding->exists ? route('weddings.show', $wedding->id) : route('weddings.index') }}"
        class="text-base inline-flex items-center bg-[#aebb98] hover:bg-[#aeb8be] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#959c88] hover:border-[#7e8f9b] rounded transition ease-in-out duration-150">Go Back</a>
    </div>
</form>