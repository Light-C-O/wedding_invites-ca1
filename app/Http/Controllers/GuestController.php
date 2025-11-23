<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Venue;
use App\Models\Wedding;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::with('venues.weddings')->get(); //fecth all guests related to the venue and weddings

        //it loads all guests along with their venues, weddings, and related venue data in one go.
        $guests = Guest::with(['venues.weddings', 'weddings.venue'])->get();
                
        //This is to view all the guests on the display site
        return view('guests.index', compact('guests')); //return the view with guests
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $venueId = $request->query('venue');    // or $request->input('venue')
        $weddingId = $request->query('wedding');

        // Optionally, you can fetch the models
        $venue = Venue::find($venueId);
        $wedding = Wedding::find($weddingId);
        
        //This is the create function when making a new guest
        $guest = null; //empty model, no data
        return view('guests.create', compact('guest', 'venue', 'wedding', 'venueId', 'weddingId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'plus1' => 'nullable|string|max:255',
            'venues' => 'nullable|array', // make sure 'venues' input is an array of IDs
            'venue_id'   => 'nullable|exists:venues,id',
            'wedding_id' => 'nullable|exists:weddings,id',
        ]);


        // Create a guest record in the database that is linked to currently logged-in user. No longer needed. It's creating the guest twice - one with the user and one without
        // Guest::create([
        //     'user_id' => auth()->id(),
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'plus1' => $request->plus1,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        //Added the logged-in user id into validated data
        $validated['user_id'] = auth()->id();
        
        // Simlified logic for creating a guest
        $guest = Guest::create($validated);

        // attach the venue(s)
        if($request->filled('venue_id')) {
            $guest->venues()->attach($request->venue_id);
        }
        
        if($request->has('venues')) {
            $guest->venues()->attach($request->venues);
        }


        

        //Return to index once created succesfully
        return to_route('guests.show', $guest->id)->with('success', 'Guest has been created successfully! 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {

        // all weddings for this guest
        $weddings = $guest->weddings()->with('venue')->get();

        // load guest's venues and their weddings for the invite component
        $venues = $guest->venues()->with('weddings')->get();

        // selected wedding via the pivot guest_wedding table
        $selectedWedding = $guest->weddings()->wherePivot('selected', true)->with('venue')->first();
        $selectedVenue = $selectedWedding?->venue;

        //all commented out as it was no longer needed
            // combine weddings from those venues for the component
                // $weddings = $venues->pluck('weddings')->flatten()->unique('id')->values();

            //default
                // $selectedWedding = null;
                // $selectedVenue = null;

            //checks whether the guest has a wedding_id; if true, 
                // if ($guest->wedding_id) {
                    //it retrieves that wedding along with its associated venue, and then stores the venue in $selectedVenue
                    // $selectedWedding = Wedding::with('venue')->find($guest->wedding_id);
                    //$selectedVenue = $selectedWedding?->venue;
                // }

            //if there is no $selectedWedding yet and the session contains a selectedWeddingId
                // if (!$selectedWedding && session()->has('selectedWeddingId')) {
                    //then retrieve that wedding with its venue and assign the venue to $selectedVenue.
                        // $selectedWedding = Wedding::with('venue')->find(session('selectedWeddingId'));
                        //  $selectedVenue = $selectedWedding?->venue;
                        // }

            //If no wedding is currently selected and a wedding ID is present in the URL query
                // if (!$selectedWedding && $id = request()->query('wedding')) {
                //     //load that wedding and its venue.
                //     $selectedWedding = Wedding::with('venue')->find($id);
                //     $selectedVenue = $selectedWedding?->venue;
                // }

            //checks if no venue is currently selected and the guest has a venue assigned
                // if (!$selectedVenue && $guest->venue_id) {
                    //load that venue
                        //$selectedVenue = Venue::find($guest->venue_id);
                    // }
        //

        //returns the guests.show view and passes it the variables so they can be used inside the Blade template.
        return view('guests.show', compact('guest', 'weddings', 'venues', 'selectedWedding', 'selectedVenue'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guest $guest)
    {
        //get all guests
        $guests = Guest::all();
        $guestVenues = $guest->venues->pluck('id')->toArray(); //id of associated venues
        $venues = $guest->venues; // Eloquent relationship
        $wedding = $guest->wedding;
        return view('guests.edit', compact('guest', 'venues', 'guestVenues', 'wedding'));
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
            'email' => 'required|email|unique:guests,email,' . $guest->id,
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
        $guest->delete();

        // Redirect  in the index page with the success message
        return to_route('guests.index')->with('success', 'A guest has been deleted successfully! 🥳');
    }

    public function attachWedding(Request $request, Guest $guest)
    {
        //validate the wedding_id
        $request->validate([
            'wedding_id' => 'required|exists:weddings,id',
        ]);

        $weddingId = (int) $request->wedding_id;

        $wedding = Wedding::with('venue')->findOrFail($weddingId);

        //commented-out - not in use
            //retrieves the wedding record matching the given wedding_id, and if it doesn’t exist, it automatically throws an error.
            // $wedding = Wedding::findOrfail($request->wedding_id);
        //

        // associates the guest with the given wedding ID while keeping all existing guest-wedding relationships intact. Attach it to the pivot table and mark it selected
        $guest->weddings()->syncWithoutDetaching([$weddingId => ['selected' => true]]);

        //
        $guest->weddings()->syncWithoutDetaching([$wedding->id]);

        //set selected = false for other pivot rows for this guest
        DB::table('guest_wedding')
            ->where('guest_id', $guest->id)
            ->where('wedding_id', '<>', $weddingId)
            ->update(['selected' => false]);

            //stores the venue ID linked to the wedding into the variable $venueId
            $venueId = $wedding->venue_id;

        //if successful, it redirects to guest show of the spefic and with the selected items for the view
        return redirect()->route('guests.show', $guest)
                            ->with('success', 'Wedding selected for guest.');
    }
}
