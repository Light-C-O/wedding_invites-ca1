@props(['first_name', 'last_name', 'venues[]', 'email', 'plus1', 'guest'])

<div>
    @foreach($guest->venues as $venue)
        @foreach($venue->weddings as $wedding)
            <!-- Guest Info -->
            <div class="bg-white mb-5 border rounded-lg border-[#adb2a5] border-5 dark:bg-[#adb2a5] p-6">
                <!-- Content -->
                    <div class="mb-4">
                        <!-- Guest's plus one -->
                            <p class="text-gray-800 font-semibold mb-2 text-2xl">You Saved a Date to {{$wedding->bride_name}} and {{$wedding->groom_name}}'s Wedding!</p>
                            <div class="mb-5">
                                <p class="underline decoration-solid text-gray-900 text-md">Plus One:</p>
                                <p class="text-gray-900"> Name: <span class="font-semibold">{{$plus1 ? $plus1 : '-Not Set-'}}</span></p>
                            </div>
                        <!-- end p1 -->
                        <!-- Guest Description -->
                            <p class="text-gray-700 dark:text-gray-800 leading-relaxed text-lg mb-5">It is with great joy that we invite you, <span class="italic">{{$first_name}} {{$last_name}}</span> to witness and celebrate the marriage of <span class="font-semibold">{{$wedding->bride_name ?? 'N/A'}}</span> and <span class="font-semibold">{{$wedding->groom_name ?? 'N/A'}}</span> at <span class="underline">{{$venue ? $venue->title : 'Unknown Venue'}}</span>. Your presence would be a treasured addition to this momentous occasion, as we come together to honor love, commitment, and the beginning of a lifelong journey.</p>
                            
                            <p class="text-gray-700 dark:text-gray-800 font-semibold text-lg leading-relaxed">Please attend on {{ \Carbon\Carbon::parse($wedding->wedding_date_time)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($wedding->wedding_date_time)->format('g:i A') }}.
                            </p>
                        <!-- end description -->
                    </div>
                    <!-- Location & Guests -->
                    <div class="text-gray-500 dark:text-gray-900 text-base font-bold mb-4 italic">
                        <!-- Guest Location -->
                            <!-- Pulled the location from Venue table -->
                            <p>Location: {{ $venue->location }}</p>
                        <!-- end location -->
                    </div>

                    <!-- Edit and delete button -->
                    <div class="flex space-x-2 place-content-end">
                        <!-- Edit button to got to the guests.edit -->
                        <a href= "{{ route('guests.edit', $guest) }}" class="bg-green-500
                        hover:bg-green-400 text-black uppercase font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-600 rounded transition ease-in-out duration-150">Edit the Invite</a>

                        <!-- Delete button -->
                        <form action="{{ route('guests.destroy', $guest) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this guest?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-[#987e82] hover:bg-[#9f9798] text-black uppercase font-bold py-2 px-4 border-b-4 border-[#6a585b] hover:border-[#585e5f] rounded transition ease-in-out duration-150">Delete the Invite</button>
                        </form>
                    </div>
            </div>
            <!-- end info -->
        @endforeach
    @endforeach
</div>