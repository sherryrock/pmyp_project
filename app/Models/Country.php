<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    //one country has many students 
    public function Student()
    {
        return  $this->hasMany(Student::class);
    }
  //RELATIONSHIPS FOR States(#One_country has #many_states)
  
  public function states()
  {
      return $this->hasMany(State::class);
  }

}

