<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Country</title>
</head>
<body>
    
    <form action="{{ route('country.update', $Country->id) }}" method="POST">  
        @csrf
        @method('PUT')
        <label for="name">Edit Name</label><br>
        <input type="text" id="name" name="name" value="{{ $Country->name }}"><br>

        <button type="submit">Update</button>
    </form>

</body>
</html>
