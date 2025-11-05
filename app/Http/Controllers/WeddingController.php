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

        //this is the create function when making a new wedding
        $wedding = null; //empty model, no data
        return view('weddings.create', compact('wedding'));
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
            'bride_name' => 'required|max:255',
            'groom_name' => 'required|max:255',
            'wedding_date' => 'required|date',
            //Request location from venue table
            'location' => 'required|max:255',
            'venue_id' => 'required|exists:venues,id',
        ]);


        //Create a new wedding

        // Create a wedding record in the database
    

        Wedding::create([
                'bride-name' => $request->bride_name,
                

                'created_at' => now(),
                'updated_at' => now()
        ]);
        Wedding::Create([
            request
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
