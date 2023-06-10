@extends('layouts.auth')
    @section('content')
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @livewire('auth.login') 
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-primary py-1 px-5"><h2 class="bold">ENTRAR</h2></button>
            </div>
        </form> 
    @endsection
