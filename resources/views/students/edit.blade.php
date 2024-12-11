@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <h1>Edit Contact</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName" value="{{ $student->firstName }}"><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" id="lastName" name="lastName" value="{{ $student->lastName }}"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="{{ $student->email }}"><br>
        <label for="phoneNo">Phone Number:</label><br>
        <input type="text" id="phoneNo" name="phoneNo" value="{{ $student->phoneNo }}"><br>
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" value="{{ $student->dob }}"><br>
        <label for="country">Country:</label><br>
        <select id="country_id" name="country_id">
            @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ $country->id == $student->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
            @endforeach
        </select><br>
        <label for="state">State:</label><br>
        <select id="state_id" name="state_id">
            @foreach($states as $state)
                <option value="{{ $state->id }}" {{ $state->id == $student->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
            @endforeach
        </select><br>
        <label for="city">City:</label><br>
        <select id="city_id" name="city_id">
            @foreach($cities as $city)
                <option value="{{ $city->id }}" {{ $city->id == $student->city_id ? 'selected' : '' }}>{{ $city->name }}</option>
            @endforeach
        </select><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address">{{ $student->address }}</textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

@endsection