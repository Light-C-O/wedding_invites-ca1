<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //This is to view all the guests on the display site
        $guests = Guest::with('venues')->get(); //fecth all guests related to the venue
        return view('guests.index', compact('guests')); //return the view with guests
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //This is the create function when making a new guest
        $guest = null; //empty model, no data
        return view('guests.create', compact('guest'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'plus1' => 'nullable|string|max:255',
        ]);



        // Create a guest record in the database
        Guest::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'plus1' => $request->plus1,
            'created_at' => now(),
            'updated_at' => now()
        ]);


        
        if($request->has('venues')){

            $guest->books()->attach($request->venues);
        }


        //Return to index once created succesfully
        return to_route('guests.index')->with('success', 'Guest has been created successfully! 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //Eager load venues and weddings for each venue
        $guest->load('venues.weddings');

        return (view('guests.show', compact('guest')));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        //get all guests
        $guests = Guest::all();
        $guestVenues = $guest->venues->pluck('id')->toArray(); //id of associated venues
        return view('guests.edit', compact('guest', 'venues', 'guestVenues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guest $guest)
    {
        //Validate the form data
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'plus1' => 'nullable|string|max:255',
        ]);



        // //update form
        // $guest->update([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'plus1' => $request->plus1,
        // ]);

        // Update the guest
        $guest->update($validated);

        if($request->has('venues')){
            $guest->venues()->sync($request->venues);
        }

        // Redirect  in the show page of the specific wedding modified with the success message
        return to_route('guests.show', $guest->id)->with('success', 'A guest has been updated successfully! 🥳');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        //to delete a guest
        $wedding->delete();

        // Redirect  in the index page with the success message
        return to_route('guests.index')->with('success', 'A guest has been deleted successfully! 🥳');
    }
}
