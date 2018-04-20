@extends('layouts.app')

@section('content')

	<h1> Perfil do usuario</h1> 

	<table>
		<tr><td>Nome:</td><td>{{ Auth::user()->name }}</td> </tr>
		<tr><td>Email:</td><td>{{ Auth::user()->email }}</td> </tr>
	</table>

@endsection