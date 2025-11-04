<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //This is to view all the venues on the display site
        $venues = Venue::all(); //fecth all venues
        return view('venues.index', compact('venues')); //return the view with venues
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->role !== 'admin'){
            return to_route('venues.index')->with('error', 'You do not have permission to create a venue.');
        }
        //This is the create function when making a new venue
        $venue = null; //empty model, no data
        return view('venues.create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('venues.index')->with('error', 'You do not have permission to create a venue.');
        }

        //Validate the request
        $request->validate([
            'title' => 'required',
            'location' => 'required|max:500',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,JPEG,png,PNG,jpg,JPG,gif,GIF|max:2048',
            'description' => 'required|max:1000',
        ]);



        // Check if the image is uploaded and handle it
        if ($request->hasFile('image')){

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/venues/'), $imageName);
        }

        // Create a venue record in the database
        Venue::create([
                'title' => $request->title,
                'location' => $request->location,
                'price' => $request->price,
                'capacity' => $request->capacity,
                'image' => $imageName, //Stores image URL in the DB
                'description' => $request->description,
                'created_at' => now(),
                'updated_at' => now()
        ]);


        // Redirect  in the index page with the success message
        return to_route('venues.index')->with('success', 'Venue has been created successfully! 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        //To dislplay a more indepth info on the venue you click on
        return view('venues.show')->with('venue', $venue);

        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('venues.index')->with('error', 'You do not have permission to view this venue.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        //This is the edit function when changing an already existing venue
        return view('venues.edit', compact('venue'));

        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('venues.index')->with('error', 'You do not have permission to edit this venue.');
        }   

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {

        // Validate the form data
        $validated = $request->validate([
            'title' => 'required',
            'location' => 'required|max:500',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'description' => 'required|max:1000',
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/venues/'), $imageName);

            // this deletes the old image from storage if needed, but leaves 
            File::delete(public_path('images/venues/' . $venue->image));

            $validated['image'] = $imageName;
        }
        else {
            $imageName= $venue ->image;
        }

        // Update the venue
        $venue->update($validated);

        //Update  a venue
        $venue->update([
            'title' => $request->title,
            'location' => $request->location,
            'price' => $request->price,
            'capacity' => $request->capacity,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        // Redirect  in the index page with the success message
        return to_route('venues.index')->with('success', 'Venue has been updated successfully! 🥳');

        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('venues.index')->with('error', 'You do not have permission to update this venue.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        //to delete a venue
        $venue->delete();
        // Redirect  in the index page with the success message
        return to_route('venues.index')->with('success', 'Venue has been deleted successfully! 🥳');


        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('venues.index')->with('error', 'You do not have permission to delete this venue.');
        }
    }
}
