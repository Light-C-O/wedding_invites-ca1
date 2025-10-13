<button class="text-base inline-flex items-center bg-gray-800 hover:bg-blue-400 text-white uppercase tracking-widest font-bold py-2 px-4 border-b-4 border-gray-400 hover:border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >
    {{ $slot }}
</button>


{{-- I didn't use it as it seems to overide things I added, since I'm using this button once no need for merge
    $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center bg-gray-800 text-2xl hover:bg-blue-400 text-white uppercase tracking-widest font-bold py-2 px-4 border-b-4 border-gray-400 hover:border-gray-700 rounded

    py-2 px-4 border border-gray-400 rounded shadow  bg-gray-800 border border-transparent font-semibold text-xs text-white uppercase tracking-widest 
    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'])

--}}
