<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\city;
use App\Models\Country;
use App\Models\State;
class CitiesController extends Controller
{
    
    public function index()
    {
         $CitiesData = city::all();
        return view('city.index', compact('CitiesData'));
    }

    public function create()
    {
        $countriesData = Country::all();
        return view('city.create', compact('countriesData'));
    }

    public function store(Request $myrequest)
    {
        // validation
        $validatedData = $myrequest->validate([
            'name' => 'required|string|max:255',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
        ]);

        // object
        $obj = new City();
        $obj->name = $myrequest->name;
        $obj->country_id = $myrequest->country_id;
        $obj->state_id = $myrequest->state_id;
        $obj->save();

        return redirect()->route('city.index')->with('success', 'City Created Successfully');
    }
    public function edit($id)
    {
        $row = city::where('id' ,$id)->first();
        return view('city.edit', ['city'=>$row]);
    }
    public function update(Request $myrequest , $id)
    {
        //validation
        $validatedData = $myrequest->validate([
            'name' =>'required|string|max:255'
        ]);
    
        $matchedRow=city::findOrFail($id);
            //Update Row
           $matchedRow->name= $myrequest->name;  
           $matchedRow->save();      

        return redirect()->route('city.index')->with('success','Record Updated Successfully');
    }


    public function destroy($id)
    {
       $matchedRow= city::findOrFail($id);
       $matchedRow->delete();
        return redirect()->route('city.index')->with('success','Record has been deleted');
    }


    public function getStates(Request $request)
    {
        //dd($request->all());
        $countryId = $request->input('cid');
        $states = State::where('country_id', $countryId)->get();
    //    dd($states);
         return response()->json($states);
    }


//     public function getStates($country)
// {
//     $states = State::where('country_id', $country)->get();
//     $options = "<option value=''>Select State</option>";
//     foreach ($states as $state) {
//         $options .= "<option value='".$state->id."'>".$state->name."</option>";
//     }
//     return $options;
// }

}
