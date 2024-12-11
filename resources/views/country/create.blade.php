@extends('layouts')
@section('content')

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/CSS/countrycreate_style.css">
</head>
<body> -->
    {{-- <form action='country.store' method="POST">  wrong way ,use routename --}}
   <form action="{{ route('country.store') }}" method="POST">
        @csrf
 
        <div class="form-group">
            <label for="name">Entry Country Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
    
        <div class="form-group"> 
            <button type="submit">Submit</button>
        </div>
        <button style="background-color:green ;text-decoration:none; text-color:white"> <a href="/students"> Main page</a> </button>

    </form>
<!-- </body>
</html> -->
@endsection