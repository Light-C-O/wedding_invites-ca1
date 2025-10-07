@props(['action', 'method'])
<!--  -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Title -->
    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>
        <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $venue->title ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
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
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
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
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
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
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('capacity')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Venue Cover Image</label>
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
    @isset($venue->image)
        <div class="mb-4">
            <img src="{{ asset($venue->image) }}" alt="Venue cover" class="w-24 h-32 object-cover">
        </div>
    @endisset


    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <input
        type="text"
        name="description"
        id="description"
        value="{{ old('description', $venue->description ?? '') }}"
        required
        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('description')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    
    <div>
        <x-primary-button>
        {{ isset($venue) ? 'Update Venue' : 'Add Venue' }}
        </x-primary-button>
    </div>
</form>