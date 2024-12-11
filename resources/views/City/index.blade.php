@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students List</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Link to custom CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include Font Awesome CSS -->
    <style>
        .dark-gray {
            color: #555 !important;
        }
    </style>
</head>
<body>
    <center>
    <h1>Cities List</h1>
    
    <a class="btn btn-success" href="{{ route('city.create') }}">Add New City</a><br/><br/><br/>
 
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table>
        <tr>
            <th>ID</th>
            <th>City Names</th>
            <th>Actions</th>
        </tr>
        @foreach ($CitiesData as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->name }}</td>

            <td>
                <a href="{{ route('city.edit', $city->id) }}" class="edit-icon dark-gray" title="Edit">
                    <i class="fas fa-pencil-alt"></i> <!-- Edit Icon -->
                </a>
                
                <form action="{{ route('city.destroy', $city->id) }}" method="POST" style="display: inline-block;">
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

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection