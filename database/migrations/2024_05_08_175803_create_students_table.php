<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->nullable()->unique();
            $table->string('phoneNo');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            $table->date('dob');
            //$table->string('state');
            //$table->foreignId('state_id')->constrained()->onDelete('cascade');
           // $table->foreign('state_id')->references('id')->on('states_tbl')->onDelete('cascade');
           $table->foreignId('state_id')->constrained()->onDelete('cascade');

            $table->foreignId('city_id')->constrained()->onDelete('cascade');

            $table->text('address');


            $table->timestamps();
        });
    }

    /**=
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
