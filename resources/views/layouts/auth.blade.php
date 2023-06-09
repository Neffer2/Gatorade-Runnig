<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <title>Document</title>
    @livewireStyles
</head> 
<body>
    @yield('content') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @livewireScripts
    <script>
         @if ($errors->any())
         Swal.fire(
            'Oops!',
            `@foreach ($errors->all() as $error)
                {{$error}}
            @endforeach`,
            'error'
            )
        @endif
        @if(session('success'))
        Swal.fire(
            'Éxito',
            `{{ session('success') }}`,
            'success'
            )
        @endif
    </script>
</body>
</html>