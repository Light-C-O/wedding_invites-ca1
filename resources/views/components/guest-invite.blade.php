@props(['first_name', 'last_name', 'venues', 'email', 'plus1', 'guest', 'weddings'])

<div>
    @foreach($venues as $venue)
        @foreach($venue->weddings as $wedding)
            <!-- Guest Info -->
            <div class="bg-white m-5 border rounded-lg border-[#adb2a5] border-5 dark:bg-[#adb2a5]">
                <!-- Content -->
                <div class="p-4 text-gray-700 dark:text-gray-800 bg-white border rounded-lg border-[#adb2a5] border-5 dark:bg-[#adb2a5]">You saved a date for <strong>{{ $wedding->bride_name }} & {{ $wedding->groom_name }}</strong>'s wedding at <strong>{{ $wedding->venue->title }}</strong> in <strong>{{$wedding->venue->location}}</strong>. Be there at <strong>{{ $wedding->wedding_date_time->format('F j, Y, g:i A') }}</strong> and celebrate! 🎉
                </div>
            </div>
            <!-- end info -->
        @endforeach
    @endforeach
</div>