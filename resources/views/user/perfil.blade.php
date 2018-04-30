@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card"> 
                <div class="card-header"> Perfil do usuario </div>                
                    <div class="card-body">                             
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block row">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            @if (count($errors) > 0)
                            <div class="alert alert-danger row">
                                <strong>Ops!</strong>Ocorreu o seguinte problema:
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif 


                            <div class="row">   
                            <div class="col-md-12">                        
                                <form action="{{ route('user.showPerfilUsuario.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>
                                        <div class="col-md-10">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                                        <div class="col-md-10">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required readonly>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>  

                                    <div class="row justify-content-md-center">  
                                        <div class="col-md-8 ">     
                                        @if (empty(Auth::user()->sexo)):
                                            <input type="radio" name="sexo" value="M"><strong> Masculino</strong>
                                            <input type="radio" name="sexo" value="F"><strong> Feminino</strong>
                                        @elseif (Auth::user()->sexo == 'M')  
                                            <input type="radio" name="sexo" value="M" checked > <strong>Masculino</strong>
                                            <input type="radio" name="sexo" value="F" ><strong> Feminino</strong>
                                        @else 
                                            <input type="radio" name="sexo" value="M"><strong> Masculino</strong>
                                            <input type="radio" name="sexo" value="F" checked ><strong> Feminino</strong>
                                        @endif
                                        </div>
                                    </div>  
                                    <hr class="my-4">
                                    <div class="row justify-content-center ">
                                        
                                        <div class="col-md-8">   
                                        <example-component :user="{{auth()->user()}}"></example-component>     
                                        </div>
                                    </div> 
                                    <div class="row justify-content-center">
                                        <div class="col-md-8"> 
                                            <button type="submit" class="btn btn-primary" >Atualizar Perfil</button>
                                        </div>  
                                    </div>    
                                </form>
                            </div> 
                        </div>         
                    </div>    
                </div>
            </div>
        </div>

</div>
@endsection