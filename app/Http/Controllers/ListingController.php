<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class ListingController extends Controller
{


    //show all listings
    public function index(Request $request){
        return view('listings.index',[
            'listings'=>Listing::latest()->filter(request(['tag','search']))->simplePaginate(6)
        ]);
    }
    //show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing'=>$listing  
        ]);
    }
    //show create form
    public function create(){
        return view('listings.create');
    }
    public function store(Request $request){
            $formFields=$request->validate([
                'title'=>'required',
                'company'=>['required',Rule::unique('listings','company')],
                'location'=>'required',
                'website'=>'required',
                'email'=>['required', 'email',Rule::unique('listings', 'email') ],
                'tags'=>'required',
                'description'=>'required'
            ]);

            if($request->hasFile('logo')){
                $formFields['logo']=$request->file('logo')->store('logos','public');
            }

            Listing::create($formFields);
              


            return redirect('/')->with('message','listed created succesfully!');
    }
}
