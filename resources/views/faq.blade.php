@extends('layouts.head')
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')

<div class="container text-justify">

	<h2 class="font-weight-bold">Perguntas Frequentes - LIFE PLACING</h2>
	

	<div class="accordion" id="accordion">
		  <div class="card">
		    <div class="card-header" id="headingOne">
		      <h5 class="mb-0">
		        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#question-one" aria-expanded="false" aria-controls="question-one">
		          Qualquer pessoa pode se cadastrar na Rede Social Life Placing?
		        </button>
		      </h5>
		    </div>

		    <div id="question-one" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
		      <div class="card-body">
		        Qualquer pessoa a partir de treze anos de idade pode se cadastrar na Rede Social Life Placing. 
		      </div>
		    </div>
		  </div>

		  <div class="card">
		    <div class="card-header" id="headingTwo">
		      <h5 class="mb-0">
		        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		          Os usuários são obrigados a se integrarem a uma das Comunidades Virtuais do portal? 
		        </button>
		      </h5>
		    </div>
		    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
		      <div class="card-body">
				Sim. Todos os usuários são obrigados a se integrarem a uma das comunidades virtuais para poderem
				operar os recursos da Life Placing. 
		      </div>
		    </div>
		  </div>
		  <div class="card">
		    <div class="card-header" id="headingThree">
		      <h5 class="mb-0">
		        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
		          Acabei de me cadastrar no portal. Por que todos os recursos do site estão desabilitados para mim?
		        </button>
		      </h5>
		    </div>
		    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
		      <div class="card-body">
				Somente após sua integração a uma das comunidades virtuais da rede social os usuários têm acesso aos
				demais recursos do site. 
		      </div>
		    </div>
  			</div>


	</div>
</div>
@endsection