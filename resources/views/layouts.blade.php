<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown</title>
    <link rel="stylesheet" href="{{ asset('css/layout_style.css') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <!-- STUDENT'S CREATE VIEW -->
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/CSS/countrycreate_style.css"> -->



  
</head>
<body> 
    <!-- Navbar -->
    <nav class="navbar">
        <a href="#"> BRAND LOGO</a>
        <a href="#website/create">Home</a>
        <a href="#">About </a>
        <a href="/country/create">Add Country</a>
        <a href="/state/create">Add State</a>
        <a href="/city/create">Add City</a>
       
    </nav>


    <!-- <div class="container"> -->
        <!-- Sidebar -->
        <!-- <aside class="sidebar">
            <ul>
                <li><a href="#">Sidebar Link 1</a></li>
                <li><a href="#">Sidebar Link 2</a></li>
                <li><a href="#">Sidebar Link 3</a></li>
            </ul>
        </aside>  -->

        <!-- Content Section -->
        <!-- <div class="content">
          
        </div>
    </div> -->
    
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    @yield('content')

  
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 @NITB Website</p>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
