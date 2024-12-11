<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index(){
        $countries = DB::table('countries')->get();
        return view('website.index', ['countries' => $countries]);
    }

    public function getState(Request $request){
        $cid = $request->post('cid');
        $states = DB::table('states')->where('country_id', $cid)->orderBy('state', 'asc')->get();
        $html = '<option value="">Select State</option>';
        foreach ($states as $state) {
            $html .= '<option value="'.$state->id.'">'.$state->state.'</option>';
        }
        return response()->json(['html' => $html]);
    }

    public function getCity(Request $request){
        $sid = $request->post('sid');
        $cities = DB::table('cities')->where('state_id', $sid)->orderBy('city', 'asc')->get();
        $html = '<option value="">Select City</option>';
        foreach ($cities as $city) {
            $html .= '<option value="'.$city->id.'">'.$city->city.'</option>';
        }
        return response()->json(['html' => $html]);
    }
}
