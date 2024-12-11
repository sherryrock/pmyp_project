<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable =[ 'firstName','lastName' ,'email',  'phoneNo', 'dob' , 
     'country_id' ,  'state_id' , 'city_id',    'address'  ];
    
     //define the relationship
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function city(){
        return $this->belongsTo(city::class);
    }

    public function state(){
        return $this->belongsTo(state::class);
    }

//RELATION FOR COUNTRY AND STATES(#ONE_COUNTRY HAS MANY_STATES)
    public function states()
    {
        return $this->hasMany(State::class);
    }

}


