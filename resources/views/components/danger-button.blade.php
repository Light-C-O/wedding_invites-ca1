<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 rounded-md text-base text-white uppercase tracking-widest hover:bg-red-500 font-bold py-2 px-4 border-b-4 border-red-800 hover:border-red-600 rounded transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
