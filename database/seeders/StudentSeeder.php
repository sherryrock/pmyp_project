<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Student; //must ADD this line
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
          
          

                'firstName'=>'Yasin',
                'lastName'=>'Khan',
                'email'=>'Yasin@gmail.com',
                'phoneNo'=>'03344822225',
                'dob' => '1999-05-05',  // Use Y-m-d format for dates
                'country_id'=>'1',
                'state_id'=>'1',// Ensure this matches the column name in your table
                'city_id'=>'1',
                'address'=>'H-13 Islamabad'
        
          
        
            // $table->string('lastName');
            // $table->string('email')->nullable()->unique();
            // $table->string('phoneNo');
            // $table->date('dob');
            // $table->string('country');
            // $table->string('state');
            // $table->string('city'); 
            // $table->text('address');
        ]);
    }
}
