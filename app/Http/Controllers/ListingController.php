<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all listings
    public function index()
    {
        // dd("Cool beans");
        return view('listings.index', [
            //'listing' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    //Show create Form
    public function create()
    {
        return view('listings.create');
    }

    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Store Listing Data
    public function store(Request $request)
    {
        // dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
    if($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store
        ('logos', 'public');
    }

$formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created
    successfully!');
    }
    //Show edit form
    public function edit(Listing $listing) 
    { 
        return view('listings.edit', ['listing' =>$listing]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        $listing->update($formFields);

        return back()->with('message', 'Listing updated
    successfully!');
    }

    //Delete Listing
    public function destroy(Listing $listing)
    {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted succesfully');
    }

    //Manage Listings
    public function manage() {
        return view('listing.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
