@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit City</title>
</head>
<body>
    
    <form action="{{ route('city.update', $city->id) }}" method="POST">  
        @csrf
        @method('PUT')
        <label for="name">Edit Name</label><br>
        <input type="text" id="name" name="name" value="{{ $city->name }}"><br>

        <button type="submit">Update</button>
    </form>

</body>
</html>

</body>
</html>
@endsection