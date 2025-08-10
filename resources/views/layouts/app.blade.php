<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Estudiantes')</title>

    <!-- Bootstrap 5 desde CDN -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>
<body>
@yield('content')



<script src="{{asset('js/bootstrap.bundle.min.js')}}">  </script>
</body>
</html>
