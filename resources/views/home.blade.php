@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Painel do Usuario</div>

                <div class="card-body">
                    
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                @if (empty(Auth::user()->foto)) :

                <div class="row">
                    <div class="col-md-2">                       
                            <img src="{{asset('uploads/avatars/images/perfil/user.jpg')}}" width="100px" height="100px">
                    </div>
                    <div class="col-md-10">
                        Seja bem vindo! {{ Auth::user()->name }}  <br>
                        <h3>Você precisa completar seu perfil para continuar</h3><a href="{{route('user.Perfil')}}"> Completar Perfil </a>
                    </div>
                </div>

                @else :

                <div class="row">
                    <div class="col-md-2">
                        <img width="100px" height="100px" src="{{ asset('uploads/avatars/'.Auth::user()->foto ) }}">  
                    </div>
                    <div class="col-md-10">
                        Seja bem vindo! {{ Auth::user()->name }}  <br>
                    </div>
                </div>

                @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
