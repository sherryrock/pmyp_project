<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{

    use HasFactory;
//add following code for relationship b/w student and city table
    protected $fillable=['name','state_id'];
    public function Student()
    {
        return  $this->hasMany(Student::class);
    }

//RELATIONSHIPS FOR City and states(#many_cities has #one_state)//also pass "state_id" in fillable.
    public function state()
    {
        return $this->belongsTo(State::class);
    }
   
}
