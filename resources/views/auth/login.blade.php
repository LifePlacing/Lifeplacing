@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm">                   
            @if ($errors->has('email'))
            <div class="p-3 mb-2 bg-danger text-white"> 
            {{ $errors->first('email') }} 
            </div>
            @endif 
            @if ($errors->has('password'))  
            <div class="p-3 mb-2 bg-danger text-white">          
            {{ $errors->first('password') }}   
            </div>
            @endif 

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}                       
                    
                </div>
            @endif


        </div>
        <div class="col-sm">
        <div class="row">
            <h1>Crie sua conta</h1>
        </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="text-md-right">{{ __('Nome') }}</label>
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group row">
                    <label for="email" class="text-md-right">{{ __('E-Mail') }}</label>
                    <input id="email-form" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>                  
                </div>

                <div class="form-group row">
                    <label for="password" class="text-md-right">{{ __('Senha') }}</label>
                    <input id="password-form" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="text-md-right">{{ __('Confirme sua Senha') }}</label>                    
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="form-group row ">

                    @if ( empty(old('sexo') ) ) :
                        <input type="radio" name="sexo" value="M" class="mx-sm-1 mb-1"> Masculino
                        <input type="radio" name="sexo" value="F" class="mx-sm-1 mb-1"> Feminino
                    @elseif (old('sexo') === 'M') : 
                        <input type="radio" name="sexo" value="M" checked class="mx-sm-2 mb-1"> Masculino
                        <input type="radio" name="sexo" value="F" class="mx-sm-2 mb-1"> Feminino
                    @else :
                        <input type="radio" name="sexo" value="M" class="mx-sm-2 mb-1" > Masculino
                        <input type="radio" name="sexo" value="F" checked class="mx-sm-2 mb-1"> Feminino
                    @endif 
               
                </div>
                <hr class="my-4">
                
               <div class="row">
                <small class="form-text text-muted">
                Ao criar sua conta, você concorda com nossos <a href="#">Termos</a>, <a href="#">Politica de Dados</a> e <a href=""> Privacidade </a>. Pode ser necessário confirmar seus dados através de email ou SMS para sua segurança. 
                </small>
                </div>

                <div class="form-group row my-1">

                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            {{ __('Criar Conta') }}
                        </button>

                </div>


            </form>



        </div>
    </div>

</div>

@endsection
