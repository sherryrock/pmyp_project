<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use App\Models\Student;


class CountryController extends Controller
{



public function index(){ 

    // Retrieve all countries
    $CountriesData = Country::all();
        
    // Pass the data to the view
    return view('country.index', compact('CountriesData'));
    // $CountriesData= Country::all();
    // return view('country.index',compact('CountriesData'));
}




public function create(){

 return view('country.create');
}


public function store(Request $myrequest){
    $validatedData= $myrequest->validate([
 'name'=>'required|string|max:255'
    ]);

    $obj =new Country();
    $obj->name=$myrequest->name;
    $obj->save();
    return redirect('/country'); // or 
//     return redirect()->route('country.index');
//   //  return redirect()->route('country.index');
}


public function edit($id){
    //   $row = Country::findOrFail($id);
     $row = Country::where('id', $id)->first();
    return view('country.edit', ['Country' =>$row]);
    //

}

public function update(Request $myrequest, $id){
    //validation:
    $validatedData= $myrequest->validate([
        'name'=>'required|string|max:255'
    ]);
     $matched_row = Country::findOrFail($id);
     // Update  row 
    $matched_row->name =$myrequest->name;
    $matched_row->save();
    
    return redirect()->route('country.index')->with('success', 'Country Updated successfully.');
}

public function destroy($id){
    $matched_row = Country::findOrFail($id);
    $matched_row->delete();

    return redirect()->route('country.index')->with('success', 'Country deleted successfully.');
}
//     public function index()
// {
//     // Retrieve the list of countries from the Country model and pluck the name and id columns
//     $countries = Country::pluck('id', 'name');
//         // Pass the list of countries to the 'students.create' view
//     return view('students.create', compact('countries'));
// }

//     // public function index()
//     // {
//     //     $countries = Country::all();
//     //     return view('countries.index', compact('countries'));
//     // }
}
