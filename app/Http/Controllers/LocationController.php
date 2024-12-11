<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
class LocationController extends Controller
{
    // public function getCountries()
    // {
    //     $countries = Country::all();
    //     return response()->json($countries);
    // }

    // public function getStates($countryId)
    // {
    //     $states = State::where('country_id', $countryId)->get();
    //     return response()->json($states);
    // }

    // public function getCities($stateId)
    // {
    //     $cities = City::where('state_id', $stateId)->get();
    //     return response()->json($cities);
    // }
}
