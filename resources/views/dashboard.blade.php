@extends('layouts.main')
<style>
    .share-buttons {
       display: flex;
       gap: 10px;
    }
    .share-button {
       border: none;
       border-radius: 5px;
       color: #fff;
       cursor: pointer;
       font-size: 16px;
       padding: 8px 16px;
    }
    .facebook {
       background-color: #3b5998;
    }
    .twitter {
       background-color: #1da1f2;
    }
    .linkedin {
       background-color: #0077b5;
    }
    .pinterest {
       background-color: #bd081c;
    }
    .reddit {
       background-color: #ff4500;
    }
    .whatsapp {
       background-color: #25d366;
    }
 </style>
    @section('content')
        Deten el tiepo en tu mano
        @php 
            $aux = str_replace('public/', '', Auth::user()->foto);
        @endphp
        <img id="imagen" src="" alt="" height="500">

        <a id="image-download" href="" download="Gatorade Runnig Series">Download</a>

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
        document.getElementById('image-download').href = imageWithLogo.src;
        });
    </script>
     <div class="share-buttons">
        <button class="share-button facebook">
           <i class="fab fa-facebook-f"></i>
        </button>
        <button class="share-button twitter">
           <i class="fab fa-twitter"></i>
        </button>
        <button class="share-button linkedin">
           <i class="fab fa-linkedin-in"></i>
        </button>
        <button class="share-button pinterest">
           <i class="fab fa-pinterest"></i>
        </button>
        <button class="share-button reddit">
           <i class="fab fa-reddit-alien"></i>
        </button>
        <button class="share-button whatsapp">
           <i class="fab fa-whatsapp"></i>
        </button>
     </div>

     <script>
        // Get all share buttons
        const shareButtons = document.querySelectorAll('.share-button');
        // Add click event listener to each button
        shareButtons.forEach(button => {
           button.addEventListener('click', () => {
              // Get the URL of the current page
              const url = window.location.href;
              // Get the social media platform from the button's class name
              const platform = button.classList[1];
              // Set the URL to share based on the social media platform
              let shareUrl;
              switch (platform) {
                 case 'facebook':
                 shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`;
                 break;
                 case 'twitter':
                 shareUrl = `https://twitter.com/share?url=${encodeURIComponent(url)}`;
                 break;
                 case 'linkedin':
                 shareUrl = `https://www.linkedin.com/shareArticle?url=${encodeURIComponent(url)}`;
                 break;
                 case 'pinterest':
                 shareUrl = `https://pinterest.com/pin/create/button/?url=${encodeURIComponent(url)}`;
                 break;
                 case 'reddit':
                 shareUrl = `https://reddit.com/submit?url=${encodeURIComponent(url)}`;
                 break;
                 case 'whatsapp':
                 shareUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(url)}`;
                 break;
              }
              // Open a new window to share the URL
              window.open(shareUrl, '_blank');
           });
        });
    </script>
    @endsection