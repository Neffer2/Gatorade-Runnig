<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <script src="https://kit.fontawesome.com/15bc5276a1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link rel="icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="https://gatorade.lat/wp-content/media/2021/04/cropped-favicons-180x180.png" />
    <title>Gatorade Runnig Series</title>
    @livewireStyles
</head>  
<body>
    <div class="row">
        <div class="col-md-2 d-flex justify-content-center">
            <div class="pt-5">
                <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Logo_MMC.png') }}" height="100">
            </div>
        </div>
        <div class="col-md-8">
            <div class="custom-container">
                <div class="row px-2">
                    <div class="col-md-12">
                        <div class="form-header orange rounded-top"> 
                            <h2 class="bold">INGRESA AQUÍ</h2> 
                        </div>
                    </div>
                    <div class="col-md-12 form-content px-4 pb-4 rounded-bottom">
                        @yield('content') 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 d-flex flex-column justify-content-between align-items-end">
            <div class="pe-5">
                <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Logo_Team_Gatorade.png') }}" alt="Logo gatorade" height="200">
            </div>
            <div class="pe-3">
                <img src="{{ asset('assets/Landing_con_foto_GATORADE_RUNING_SERIES_Logo_G.png') }}" alt="Logo gatorade" height="100">
            </div>
        </div>
    </div>
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