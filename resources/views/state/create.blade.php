@extends('layouts.app')
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/CSS/countrycreate_style.css">
</head>

<body>

<center>
<br>
<br>
<h4>Add State</h4>
<br>
<br>
    <!-- {{-- <form action='country.store' method="POST">  wrong way ,use routename --}} -->
    <form action="{{ route('state.store') }}" method="POST">
    @csrf
    <!-- Country Dropdown -->
    <div class="form-group">
        <label for="country">Country:</label>
        <select id="country" name="country_id" required>
            <option value="">Select Country</option>
            @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
  

    </div>
    <div class="form-group">
        <label for="name">Entry state Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    <!-- Add a hidden input field to store the selected country ID -->

    <div class="form-group"> 
        <button type="submit">Submit</button>
    </div>
    <button style="background-color:green ;text-decoration:none; text-color:white"> <a href="/students"> Main page</a> </button>

</form>
</center>

<!-- <script>
    // JavaScript code to update the hidden input field with the selected country ID
    document.getElementById('country').addEventListener('change', function() {
        document.getElementById('selected_country_id').value = this.value;
    });
</script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
</html>

@endsection