<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use App\Models\Venue;
use Illuminate\Http\Request;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fetch all weddings
        $weddings = Wedding::with('venue')->get();
        return view('weddings.index', compact('weddings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('weddings.index')->with('error', 'You do not have permission to create a wedding.');
        }

        //this is to pull information from the venues table
        $venues = Venue::all();

        //this is the create function when making a new wedding
        $wedding = new Wedding(); //empty model, no data
        return view('weddings.create', compact('wedding', 'venues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Authorization check
        if(auth()->user()->role !== 'admin'){
            return to_route('weddings.index')->with('error', 'You do not have permission to create a wedding.');
        }

        //Validate the request
        $request->validate([
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'best_man' => 'nullable|string|max:255',
            'maid_of_honor' => 'nullable|string|max:255',
            'wedding_date_time' => 'required|date_format:Y-m-d\TH:i',
            //Request title from venue table
            'venue_id' => 'required|exists:venues,id',
        ]);


        //Create a new wedding

        // Create a wedding record in the database
        Wedding::create([
            'bride_name' => $request->bride_name,
            'groom_name' => $request->groom_name,
            'wedding_date_time' => $request->wedding_date_time,
            'best_man' => $request->best_man,
            'maid_of_honor' => $request->maid_of_honor,
            'venue_id' => $request->venue_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //Return to index once create succesfully
        return to_route('weddings.index')->with('success', 'Wedding has been created successfully! 🥳');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wedding $wedding)
    {
        //
        $wedding->load('venue');

        return view('weddings.show', compact('wedding'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wedding $wedding)
    {
        //
        $venues = Venue::all();
        
        return view('weddings.edit', compact('wedding', 'venues'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wedding $wedding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wedding $wedding)
    {
        //
    }
}
