@extends('layouts.auth')
    @section('content')
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            @livewire('auth.register')
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary py-1 px-5"><h2 class="bold">REGISTRAR</h2></button>
            </div>
        </form> 
    @endsection
 