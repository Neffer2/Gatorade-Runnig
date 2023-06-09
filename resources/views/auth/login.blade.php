@extends('layouts.auth')
    @section('content')
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @livewire('auth.login') 
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form> 
    @endsection
