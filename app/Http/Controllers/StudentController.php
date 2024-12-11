<?php
//
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Country;
use App\Models\city;
use App\Models\State;

class StudentController extends Controller
{
    
    public function index()
    {
        //return view('students.index', ['studentData' => Student::all()]);

        $studentData  = Student::all();
        return view('students.index', compact('studentData'));
        
  //below one also true
        // $data = Student::all();
        // return view('students.index', ['data' => $data]);

    }
 
    public function create()
    {
          // Retrieve the list of countries from the Country model and pluck the name and id columns
            $countries = Country::all();
            $cities = city::all();
            $states= State::all();
            // $states=State::all();

            // dd($countries);
           // Pass the list of countries to the 'students.create' view
        return view('students.create', compact('countries' ,'cities','states'));

        // return view('/students/create');
    }

    public function store(Request $myrequest)
    {

        // dd($myrequest->all());
        $validatedData = $myrequest->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:students|max:255',
            'phoneNo' => 'required|string|max:20',
            'dob' => 'required|date',
            'country_id' => 'required|exists:countries,id',//we add this line for relationships
            'state_id' => 'required|string|max:255',
            'city_id' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        // Create a new Student instance and set its properties
        $student = new Student();
        $student->firstName = $myrequest->firstName;
        $student->lastName = $myrequest->lastName;
        $student->email = $myrequest->email;
        $student->phoneNo = $myrequest->phoneNo;
        $student->dob = $myrequest->dob;
        $student->country_id = $myrequest->country_id;
        $student->state_id = $myrequest->state_id;
        $student->city_id = $myrequest->city_id;
        $student->address = $myrequest->address;

        // Save the student to the database
        $student->save();
        //redirection with route URL Directlys
        // return redirect("/students")->with('success', 'Student created successfully.');
       
        // // //redirection with route name Directly
        return redirect()->route("students.index")->with('success', 'Student created successfully.'); 

    }


    public function edit($id)  
    {
       // $student = Student::findOrFail($id);
        
        $student = student::where('id' ,$id) ->first();

        $countries = Country::all();
        $cities = City::all();
        $states =State::all();
       
        // return view('/students/{id}/edit', compact('student'));
        

        //return view('students.edit', compact('student'));
        // return view('students.edit', ['student'=>$student]);
        return view('students.edit', compact('student', 'countries', 'cities','states'));
    }

    public function update(Request $myrequest, $id)
    {
        // Validate the myrequest data
        $validatedData = $myrequest->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|unique:students,email,' . $id,

            'phoneNo' => 'required|string|max:20',
            'dob' => 'required|date',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string',
        ]);


        // $student = Student::findOrFail($id);
        // $student->update($validatedData);
        $student = Student::findOrFail($id);

        // Update student data 
        $student->firstName = $myrequest->firstName;
        $student->lastName = $myrequest->lastName;
        $student->email = $myrequest->email;
        $student->phoneNo = $myrequest->phoneNo;
        $student->dob = $myrequest->dob;
        $student->country_id = $myrequest->country_id;
        $student->state_id = $myrequest->state_id;
        $student->city_id= $myrequest->city_id;
        $student->address = $myrequest->address;

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }



    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success','Record Deleted Successfully');
    }


    public function getStates(Request $request)
{
    //dd($request->all());
    $countryId = $request->input('country_id');
    $states = State::where('country_id', $countryId)->get();
   // dd($states);
    return response()->json($states);
}

public function getCities(Request $request)
{
  // dd($request->all());
    $sid = $request->input('sid');
   // $cities=DB::table('cities')->where('state_id',$sid)->get();
   $cities = City::where('state_id', $sid)->get();
   // dd($cities);
     return response()->json($cities);
}


}
