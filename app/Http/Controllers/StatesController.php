<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Models\State;
use App\Models\State; 
use App\Models\Country; 
class StatesController extends Controller
{
    public function index(){
        $StatesData = State::all();
        
        // Pass the data to the view
        return view ('state.index', compact('StatesData'));
      
    }


    public function create(){
        
        $countries = Country::all(); // Fetch all countries from the database
        return view('state.create', ['countries' => $countries]); // Pass the countries to the view
    

        // return view('state.create');
    }

    
    public function store(Request $myrequest)
    {
        $validatedData = $myrequest->validate(
            [
          //  'name' => 'required|string|max:255|unique:states,name,NULL,id,country_id,' . $request->country_id,
         // 'name' => ['required', 'string', 'max:255', Rule::unique('states')->where('country_id', $myrequest->country_id)],
            'name' => 'required|string|max:255|unique:states',
            'country_id' => 'required|exists:countries,id', // Validate the selected country ID
             ] 
    );
    


        $state = new State();
        $state->name = $myrequest->name;
        $state->country_id = $myrequest->country_id; // Associate the selected country ID with the state
        $state->save();
    
        return redirect()->route('state.index')->with('success', 'State created successfully.');
    }

    // public function store(Request $myrequest){
    //     $validatedData= $myrequest->validate([
    //         'name'=>'required|string|max:255',
    //         'country_id' => 'required|exists:countries,id' // Ensure the selected country ID exists in the countries table
   
    //            ]);
           
    //            $obj =new State();
    //            $obj->name=$myrequest->name;
    //            $state->country_id = $myrequest->country_id; // Use $myrequest to access the country_id
    //          // $obj->country->name=$myrequest->country->name;
    //            $obj->save();
    //            return redirect('/state.store'); 
    
    // }



    // public function edit($id){
         
    //  //$row = State::where('id', $id)->first();
    
    //  //return view('state.edit', ['State' =>$row]);
    //  $row = State::findOrFail($id);
    //  return view('state.edit', compact('row'));
       
    // }

    public function edit($id){
        $state = State::findOrFail($id);
        return view('state.edit', compact('state'));
    }
    public function update(Request $myrequest, $id){
         //validation:
    $validatedData= $myrequest->validate([
        'name'=>'required|string|max:255'
    ]);
     $matched_row = State::findOrFail($id);
     // Update  row 
    $matched_row->name =$myrequest->name;
    $matched_row->save();
    
    return redirect()->route('state.index')->with('success', 'City Updated successfully.');

      
    }


    public function destroy($id){
        $matched_row = State::findOrFail($id);
        $matched_row->delete();
    
        return redirect()->route('state.index')->with('success', 'Country deleted successfully.');
    
    }

}
