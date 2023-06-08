@extends('layouts.auth')
    @section('content')
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            @livewire('auth.register')
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form> 
    @endsection
