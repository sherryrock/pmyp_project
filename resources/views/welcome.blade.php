@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <center>
    <!-- <img src="asset('Images\nitb_logo.png')" > WRONG -->
    <img src="{{ asset('Images/nitb_logo.png') }}" alt="NITB Logo" height="250" width="200">   
    <h1>WELCOME TO NITB </h1></center>
</body>
</html>
@endsection