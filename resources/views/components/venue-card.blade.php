@props(['title', 'image'])

<div class="bg-[#ffc15d] border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300">
    <h4 class="font-bold text-lg">{{$title}}</h4>
    <img class="h-259 w-full object-fill" src="{{asset('images/venues/' . $image)}}" alt="{{$title}}">
</div>