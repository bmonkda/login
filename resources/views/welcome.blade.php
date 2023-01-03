<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
    
    {{-- <nav>
        <ul>
             <li><a href="{{ route('welcome') }}"></a>Inicio</li>
             <li><a href="{{ route('login') }}"></a>Login</li>
             <li><a href="{{ route('dashboard') }}"></a>Dashboard</li>
             <li><a href="{{ "#" }}"></a>Logout</li>
         </ul>
     </nav> --}}

    @include('partials.nav')
     
    <h1>Inicio</h1>
    
</body>
</html>