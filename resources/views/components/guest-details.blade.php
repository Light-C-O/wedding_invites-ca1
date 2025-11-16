@props(['first_name', 'last_name', 'email', 'plus1'])

<!-- Guest Detail -->
<div  iv class="bg-[#f8f5ed] dark:bg-[#5a6365] border rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 mx-auto"> <!-- Limit the overall container width to make the component more compact -->
    <div class="text-black dark:text-gray-100">
        <!-- Guest name -->
        <h1 class="text-5xl font-bold mb-2">{{$first_name}} {{$last_name}}</h1> 
        <!-- end gm -->
        <!-- plus 1 -->
        <h1 class="text-lg font-bold">
            @if ($plus1 != null)
                Plus One: {{$plus1}}
            @else
                Plus One: <span class="text-gray-700 dark:text-gray-100">-None-</span>
            @endif
        </h1> 
        <!-- end +1 -->
        <!-- Email -->
            <p>Email: {{ $email }}</p>
        <!-- end email -->
    </div>
</div>