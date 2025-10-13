@if(session('success'))
    <div class="mb-4 py-10 px-2 bg-green-100 border border-green-500 text-green-700 font-bold uppercase text-2xl rounded-md text-center">
        {{$slot}}
    </div>
@endif