@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <!-- student_index view -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Link to custom CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body>
    <!-- resources/views/students/index.blade.php -->

<center>

    <h1>Students List</h1>
   
    <a class="btn btn-success" style="color:white;" href="{{ route('students.create') }}">Add New Student</a><br/> <br/> <br/> 

    <table>

        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Date of Birth</th>
            <th>Country</th>
            <th>State</th>
            <th>City</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        @foreach ($studentData as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->firstName }}</td>
            <td>{{ $student->lastName }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phoneNo }}</td>
            <td>{{ $student->dob }}</td>
            <td>{{ $student->country->name }}</td>
            <td>{{ $student->state->name }}</td>
            <td>{{ $student->city->name }}</td>
            <td>{{ $student->address }}</td>
            <td>
                {{-- href tag with route name  --}}
                {{-- <a href="{{ route('students.edit', $student->id) }}" class="edit-icon dark-gray" title="Edit">
                    <i class="fas fa-pencil-alt"></i> <!-- Edit Icon -->
                </a> --}}
                 {{-- href tag with route URL  --}}
                 <a href="/students/{{ $student->id }}/edit" class="edit-icon dark-gray" title="Edit">
                    <i class="fas fa-pencil-alt"></i> <!-- Edit Icon -->
                </a>
                 
                <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-icon dark-gray" title="Delete">
                        <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                    </button>
                </form> 
            </td>
        </tr>
        @endforeach
    </table> 

    </center>
</body>
</html>


</body>
</html>
@endsection