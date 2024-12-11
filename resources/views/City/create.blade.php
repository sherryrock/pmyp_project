@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create City</title>
    <link rel="stylesheet" href="/CSS/countrycreate_style.css">
</head>
<body>

     

    <form action="{{ route('city.store') }}" method="POST">
        @csrf
     
   
        <!-- Country Dropdown -->
        <div>
            <label for="country">Country:</label>
            <select id="country" name="country_id">
                <option value="">Select Country</option>
                @foreach($countriesData as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- State Dropdown -->
        <div>
            <label for="state">State:</label>
            <select id="state" name="state_id">
                <option value="">Select State</option>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Entry City Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
        <button style="background-color:green ;text-decoration:none; text-color:white"> <a href="/students"> Main page</a> </button>


    </form>
  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var countryId = $(this).val();
                if (countryId) {
                    $.ajax({
                        url: "/getState",
                        type: "POST",
                        data: {
                            cid: countryId,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(states) {
                            $('#state').empty().append('<option value="">Select State</option>');
                            states.forEach(function(state) {
                                $('#state').append('<option value="' + state.id + '">' + state.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty().append('<option value="">Select State</option>');
                }
            });
        });
    </script>
</body>
</html>
@endsection