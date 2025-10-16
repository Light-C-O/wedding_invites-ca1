<!-- action: the URL the form should redirect to.method: the HTTP method (like POST, PUT -->
<!-- venue => null in order to create a new venue -->
@props(['action', 'method', 'venue' => null])
<!--It will submit to the URL given by $action.

It uses the POST method always in HTML, even for PUT/PATCH (Laravel handles this later).

enctype="multipart/form-data" is required when uploading files (like images).  -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    <!-- It's required in every Laravel form -->
    @csrf
    <!-- HTML forms don’t support PUT/PATCH, so Laravel uses this trick. -->
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <!-- This says that 'title' is required. If form is being reloaded (like after a validation error), it shows the previous input (old('title')). Otherwise, it shows the venue's current title (if you'rer editing). If there is no value, it is blank. -->
        <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $venue->title ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <!-- If there is a error for the title, this shows the error message in red, stating that is not valid. -->
        @error('title')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Location -->
    <div class="mb-4">
        <label for="location" class="block text-sm text-gray-700">Location</label>
        <input
        type="text"
        name="location"
        id="location"
        value="{{ old('location', $venue->location ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <!-- Throw an error is requiremtns is not met -->
        @error('location')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price -->
    <div class="mb-4">
        <label for="price" class="block text-sm text-gray-700">Price</label>
        <input
        type="float"
        name="price"
        id="price"
        value="{{ old('price', $venue->price ?? '') }}"
        required
        class="p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('price')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Capacity -->
    <div class="mb-4">
        <label for="capacity" class="block text-sm text-gray-700">Capacity</label>
        <input
        type="integer"
        name="capacity"
        id="capacity"
        value="{{ old('capacity', $venue->capacity ?? '') }}"
        required
        class="p-2 mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('capacity')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Venue Cover Image</label>
        <!-- It is required only if we're adding a new venue. -->
        <input
        type="file"
        name="image"
        id="image"
        {{ isset($venue) ? '' : 'required' }}
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
        />
        @error('image')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <!--Checks if the venue has an image. This is only true if we're editing a venue and it has an image already saved. -->
    @isset($venue->image)
        <div class="mb-4">
            <!-- Displays the existing venue image.asset($venue->image) gives the full URL to the image. The image has a fixed size and cropped to look neat. -->
            <img src="{{ asset('images/venues/' . $venue->image) }}" alt="Venue cover" class="w-24 h-32 object-cover">
        </div>
    @endisset


    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <!-- using textarea tab instead of input for the description to be more easy on the eye as well as for reading -->
        <textarea
        rows="8"
        cols="50"
        type="text"
        name="description"
        id="description"
        value="{{ old('description', $venue->description ?? '') }}"
        required
        class="overflow mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $venue->description ?? '') }}</textarea>
        @error('description')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <!-- If you're editing a venue,($venue is set) the button says 'Update Venue' otherwise, 'Add Venue' since you are creating one  -->
        <x-primary-button class="gap-4">
            <!-- in order to edit a venue, $venue must not be empty -->
            @if($venue !== null)
                <p>{{ 'Update Venue' }}</p>
                <!-- The cancel button -->
                <button class="bg-[#aebb98] hover:bg-[#aeb8be] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#959c88] hover:border-[#7e8f9b] rounded transition ease-in-out duration-150">
                    <a href="{{ route('venues.show', ['venue' => $venue->id]) }}">Go Back</a>
                </button>
            <!-- if $venue is null then add a new one -->
            @else
                <p>{{ 'Add Venue' }}</p>
                <!-- The cancel button -->
                <button class="bg-[#aebb98] hover:bg-[#aeb8be] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#959c88] hover:border-[#7e8f9b] rounded transition ease-in-out duration-150">
                    <a href="{{ route('venues.index') }}">Go Back</a>
                </button>
            @endif

        </x-primary-button>
    </div>
</form>