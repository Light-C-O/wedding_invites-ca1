@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-indigo-400 dark:border-yellow-400 text-start text-base text-gray-500 dark:text-yellow-700 font-medium text-indigo-700 bg-indigo-50 dark:bg-yellow-50 focus:outline-none focus:text-indigo-800 dark:focus:text-yellow-800 dark:focus:bg-yellow-100 focus:bg-indigo-100 focus:border-indigo-700 dark:focus:border-yellow-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base text-gray-500 font-medium dark:text-gray-100 dark:hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-200 focus:border-gray-400 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>