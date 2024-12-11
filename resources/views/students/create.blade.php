
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link rel="stylesheet" href="{{ asset('css/styles1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action='/students' method="POST">
            @csrf

            <!-- First Name Field -->
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>

            <!-- Last Name Field -->
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Phone Number Field -->
            <div class="form-group">
                <label for="phoneNo">Phone Number:</label>
                <input type="tel" id="phoneNo" name="phoneNo" pattern="^03\d{9}$" title="Please enter a valid 11-digit mobile number without country code" required>
            </div>

            <!-- Date of Birth Field -->
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>


                <!-- Country Dropdown -->
        <div>
            <label for="country">Country:</label>
            <select id="country" name="country_id" required>
                <option value="">Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

      <!-- State Dropdown -->
      <div>
            <label for="state">State:</label>
            <select id="state" name="state_id" required>
                <option value="">Select State</option>
            </select>
        </div>

 <!-- City Dropdown -->
        <div>
            <label for="city">City:</label>
            <select id="city"   name="city_id" required>
                <option value="">Select City</option>
            </select>
        </div>
    </div>

            <!-- Address Field -->
            <div class="form-group" >
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- AJAX Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
$(document).ready(function(){
    // Fetch states based on selected country
    $('#country').change(function(){
        var countryId = $(this).val();
        if(countryId){
            $.ajax({
                url: "{{ route('getStates') }}",
                type: "POST",
                data: { country_id: countryId, _token: '{{ csrf_token() }}' },
                dataType: "json",
                success: function(states){
                    $('#state').empty().append('<option value="">Select State</option>');
                      // Loop through each state and add to state dropdown using forEach
                      states.forEach(function(state) {
                      $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                        });
                    // $.each(states, function(index, state){
                    //     $('#state').append('<option value="'+ state.id +'">'+ state.name +'</option>');
                    // });
                }
            });
        } else {
            $('#state').empty().append('<option value="">Select State</option>');
            $('#city').empty().append('<option value="">Select City</option>');
        }
    });

    // Fetch cities based on selected state
    $('#state').change(function(){
        var stateId = $(this).val();
        if(stateId){
            $.ajax({
                // url: "{{ route('getCities') }}",
                url: "/getCities",
                type: "POST",
                data: { sid: stateId, _token: '{{ csrf_token() }}' },
                dataType: "json",
                success: function(cities){

                    //console.log(cities); // Check if cities are received
                    $('#city').empty().append('<option value="">Select City</option>');

                    // $.each(cities, function(index, city){
                    //     //console.log(city); // Check each city
                    //     $('#city').append('<option value="'+ city.id +'">'+ city.name +'</option>');
                    // });
                    //IF WE USE FOR EACH .INSTEAD OF.EACH
                    cities.forEach(function(city) {
                  $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });

                }
            });
        } else {
            $('#city').empty().append('<option value="">Select City</option>')
        }
    });
});
</script>
</body>
</html>

@endsection