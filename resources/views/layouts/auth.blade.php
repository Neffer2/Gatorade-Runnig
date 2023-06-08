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
    </script>
    <script>
        // Crear el lienzo (canvas)
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Crear la imagen original
        const originalImage = new Image();
        originalImage.src = "{{ asset('pruebas/andrea.jpg') }}";

        // Crear el logo
        const logo1 = new Image();
        logo1.src = "{{ asset('pruebas/logo.png') }}";

        const logo2 = new Image();
        logo2.src = "{{ asset('pruebas/logo.png') }}";
        
        const logo1Width = 200; // Anchura deseada del logo
        const logo1Height = 73; // Altura deseada del logo

        const logo2Width = 200; // Anchura deseada del logo
        const logo2Height = 73; // Altura deseada del logo

        // Cuando tanto la imagen original como el logo se hayan cargado
        Promise.all([
            new Promise((resolve) => originalImage.onload = resolve),
            new Promise((resolve) => logo1.onload = resolve),
            new Promise((resolve) => logo2.onload = resolve)
        ]).then(() => {
        // Establecer el tamaño del lienzo al tamaño de la imagen original
        canvas.width = originalImage.width;
        canvas.height = originalImage.height;

        // Dibujar la imagen original en el lienzo
        ctx.drawImage(originalImage, 0, 0);

        // Dibujar el logo en una posición específica
        const logo1X = 5 ; // Ajusta la posición del logo en el eje X
        const logo1Y = canvas.height - (logo1Height + 10); // Ajusta la posición del logo en el eje Y
        ctx.drawImage(logo1, logo1X, logo1Y, logo1Width, logo1Height);

        // Dibujar el logo en una posición específica
        const logo2X = canvas.height - (logo2Width + 5) ; // Ajusta la posición del logo en el eje X
        const logo2Y = canvas.height - (logo2Height + 10); // Ajusta la posición del logo en el eje Y
        ctx.drawImage(logo2, logo2X, logo2Y, logo2Width, logo2Height);

        // Obtener la imagen resultante con el logo
        const imageWithLogo = new Image();
        imageWithLogo.src = canvas.toDataURL();

        // Agregar la imagen resultante al documento
        document.body.appendChild(imageWithLogo);
        });
    </script>
</body>
</html>