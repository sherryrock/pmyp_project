<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable=['name', 'country_id','state_id','city'];

    //define the relatoinship for student and states
    public function students(){
        return $this->hasMany(Student::class);//add semicolon at the end
    }

  //RELATIONSHIPS FOR States(#many_states has #one_country)//also add country_id in fillable 
  public function country()
  {
      return $this->belongsTo(Country::class);
  }

//RELATIONSHIPS FOR City and states(#one_state has #many_cities)//
public function cities()
{
    return $this->hasMany(City::class);
}

       // Specify the custom table name
       protected $table = 'states';
}
