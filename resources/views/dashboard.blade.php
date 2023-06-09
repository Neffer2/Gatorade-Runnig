@extends('layouts.main')
    @section('content')
        Deten el tiepo en tu mano
        @php 
            $aux = str_replace('public/', '', Auth::user()->foto);
        @endphp
        <img id="imagen" src="" alt="" height="500">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>Salir</button>
        </form>
    @endsection 
    @section('scripts') 
    <script>
        // Crear el lienzo (canvas)
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Crear la imagen original
        const originalImage = new Image();
        originalImage.src = "{{ asset("storage/$aux") }}";

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
        const logo2X = canvas.width - (logo2Width + 5) ; // Ajusta la posición del logo en el eje X
        const logo2Y = canvas.height - (logo2Height + 10); // Ajusta la posición del logo en el eje Y
        ctx.drawImage(logo2, logo2X, logo2Y, logo2Width, logo2Height);

        // Obtener la imagen resultante con el logo
        const imageWithLogo = new Image();
        imageWithLogo.src = canvas.toDataURL();

        // Agregar la imagen resultante al documento
        // console.log();
        // document.body.appendChild(imageWithLogo);
        document.getElementById('imagen').src = imageWithLogo.src;
        });
    </script>
    @endsection