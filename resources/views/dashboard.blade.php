@extends('layouts.main')
   @section('content')
      <div class="row">
         <div class="col-md-6 d-flex justify-content-start align-items-center dash-left" id="bg-left">
            <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Concepto.png') }}" alt="">
         </div>
         <div class="col-md-6 right-side" id="phone">  
            <div class="d-flex justify-content-end align-items-center pe-5 logos-header">
               <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Logo_MMC.png') }}">
               <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Logo_Team_Gatorade.png') }}" alt="Logo gatorade">
            </div>
            @php 
               $aux = Auth::user()->foto;
            @endphp
            <div class="d-flex justify-content-start image-container">
               <img id="imagen" src="" alt="" height="350" style="border-radius: 3rem" class="mt-4 shadow-lg">
            </div>

            <div class="button-container">
               <div class="row">
                  <div class="col-md-6">
                     <a id="image-download1" href="" class="btn btn-primary py-1 px-5 mt-2 me-1" download="Gatorade Runnig Series">
                        <h3 class="bold"><i class="fa-solid fa-download"></i> DESCARGAR</h3>
                     </a>
                  </div>
                  <div class="col-md-6">
                     <a id="image-download1" href="" class="btn btn-primary py-1 px-5 mt-2 me-1" download="Gatorade Runnig Series">
                        <h3 class="bold"><i class="fa-solid fa-share"></i> COMPARTIR</h3>
                     </a>
                  </div>
               </div>            
               {{-- <button class="share-button facebook py-1 px-3 mt-2 me-1">
                  <i class="fab fa-facebook-f"></i>
               </button>
               <a id="image-download2" href="" class="share-button instagram py-1 px-3 mt-2 me-1" download="Gatorade Runnig Series">
                  <i class="fa-brands fa-instagram"></i>
               </a>
               <button class="share-button whatsapp py-1 px-3 mt-2 me-1">
                  <i class="fab fa-whatsapp"></i>
               </button> --}}
            </div>
            {{-- <form action="{{ route('logout') }}" method="POST">
               @csrf
               <button>Salir</button>
            </form>             --}}
         </div>
         {{-- <div class="col-md-12 d-flex justify-content-end"> 
            <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Logo_G.png') }}" alt="" height="100">
         </div> --}}
      </div>
    @endsection 
    @section('scripts') 
    <script>
         let imagenLogo = "";
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const originalImage = new Image();
        originalImage.src = "{{ asset("fotos/$aux") }}";

        const logo1 = new Image();
        logo1.src = "{{ asset('logos/logo.png') }}";
        const logo2 = new Image();
        logo2.src = "{{ asset('logos/logo.png') }}";      
        const logo1Width = 200;
        const logo1Height = 73;
        const logo2Width = 826.6;
        const logo2Height = 708.6;
      
        Promise.all([
            new Promise((resolve) => originalImage.onload = resolve),
            new Promise((resolve) => logo1.onload = resolve),
            new Promise((resolve) => logo2.onload = resolve)
        ]).then(() => {
        canvas.width = originalImage.width;
        canvas.height = originalImage.height;
        ctx.drawImage(originalImage, 0, 0);
        const logo1X = 5 ;
        const logo1Y = canvas.height - (logo1Height + 10);
      //   ctx.drawImage(logo1, logo1X, logo1Y, logo1Width, logo1Height);

        const logo2X = canvas.width - (logo2Width + 40);
        const logo2Y = canvas.height - (logo2Height + 20);
        ctx.drawImage(logo2, logo2X, logo2Y, logo2Width, logo2Height);

        const imageWithLogo = new Image();
        imageWithLogo.src = canvas.toDataURL();

        /* ***** */
        // Decodificar la imagen Base64
         const imageData = imageWithLogo.src.split(',')[1];
         const decodedImageData = atob(imageData);

         // Convertir la imagen decodificada en un arreglo de bytes
         const byteCharacters = decodedImageData.split('').map(char => char.charCodeAt(0));
         const byteArray = new Uint8Array(byteCharacters);

         // Crear un objeto Blob a partir del arreglo de bytes
         const blob = new Blob([byteArray], { type: 'image/png' }); // Ajusta el tipo MIME según el formato de la imagen

         // Crear un objeto FormData y agregar el blob
         const formData = new FormData();
         formData.append('image', blob, 'image.png'); // El último parámetro es el nombre del archivo
         
         const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
         fetch('updateLogo', {
         method: 'POST',
         body: formData,
         headers: {
               'X-CSRF-TOKEN': csrfToken
            }    
         })
         .then(response => response.json())
         .then(response => {
            if (response.status == 'ok') {
               imagenLogo = response.data.logo;
            }
         })
         .catch(error => {
            // Manejar el error en caso de fallo en la solicitud
            // console.error('Error en la solicitud:', error);
         });
        /* ***** */

        document.getElementById('imagen').src = imageWithLogo.src;
        document.getElementById('image-download1').href = imageWithLogo.src;
        document.getElementById('image-download2').href = imageWithLogo.src;
        });
    </script>
    
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
                 shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${window.location.hostname}/fotos_logo/${imagenLogo}`;
                 break;
                 case '':
                 shareUrl = `https://www.instagram.com/add/?url=${window.location.hostname}/fotos_logo/${imagenLogo}`;
                 break;
                 case 'whatsapp':
                 shareUrl = `https://api.whatsapp.com/send?text=${window.location.hostname}/fotos_logo/${imagenLogo}`;
                 break;
              }
              // Open a new window to share the URL
              window.open(shareUrl, '_blank');
           });
        });
    </script>
    @endsection