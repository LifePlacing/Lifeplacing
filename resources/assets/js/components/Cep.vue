<template>
<div class="form-group" v-if="this.user.cep == null">
    <div class="form-group col-md-12 row ">
        <div class="col-md-4">
            <div class="form-group">
              <label for="inputCep">CEP</label>
              <input class="form-control" ref="cep" type="text"  v-model="cep" v-on:keyup="buscar" name="cep" maxlength="8" size="8" />             
            </div>
        </div>
        <div class="col-md-8"><span class="text-danger" v-show="naoLocalizado"><strong>* CEP não encontrado</strong></span>
        </div>
    </div>

    <div class="form-group col-md-12 row">

      <div class="col-md-5">
        <div class="form-group">
          <label for="inputLogradouro">Logradouro</label>
          <input class="form-control" id="inputLogradouro" type="text" v-model="endereco.logradouro" name="logradouro" />          
        </div>
      </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="inputNumero">Número</label>
          <input class="form-control" id="inputNumero" type="number" name="numero"/>          
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
          <label for="inputComplemento">Complemento</label>
          <input class="form-control" id="inputComplemento" type="text" name="complemento"/>          
        </div>
    </div>
    
    </div>

    <div class="form-group col-md-12 row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="inputBairro">Bairro</label>
          <input class="form-control" id="inputBairro" type="text" v-model="endereco.bairro" name="bairro" />
          </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="inputCidade">Cidade</label>
          <input class="form-control" id="inputCidade" type="text" v-model="endereco.localidade" name="cidade" readonly/>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="inputEstado">Estado</label>
          <input class="form-control" id="inputEstado" type="text" v-model="endereco.uf" maxlength="2" name="estado" readonly/>
        </div>
      </div>
    </div>                           
</div>

<div class="form-group" v-else >
    <div class="form-group col-md-12 row ">
        <div class="col-md-4">
            <div class="form-group">
              <label for="inputCep">CEP</label>              
              <input class="form-control" type="text" v-model="cep"  name="cep" maxlength="8" size="8"  readonly />
            </div>
        </div>

    </div>

    <div class="form-group col-md-12 row">

      <div class="col-md-5">
        <div class="form-group">
          <label for="inputLogradouro">Logradouro</label>
          <input class="form-control" id="inputLogradouro" type="text" :value="logradouro" name="logradouro" readonly />
        </div>
      </div>

    <div class="col-md-2">
        <div class="form-group">
          <label for="inputNumero">Número</label>
          <input class="form-control" id="inputNumero" type="number" name="numero" :value="numero" readonly />
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
          <label for="inputComplemento">Complemento</label>
          <input class="form-control" id="inputComplemento" v-if="this.user.complemento == null" type="text" name="complemento" />
          <input class="form-control" id="inputComplemento" v-else type="text" name="complemento" :value="complemento" readonly />
        </div>
    </div>
    
    </div>

    <div class="form-group col-md-12 row">
      <div class="col-md-5">
        <div class="form-group">
          <label for="inputBairro">Bairro</label>
          <input class="form-control" id="inputBairro" type="text" name="bairro" :value="bairro" readonly/>
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label for="inputCidade">Cidade</label>
          <input class="form-control" id="inputCidade" type="text" name="cidade" :value="cidade" readonly/>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label for="inputEstado">Estado</label>
          <input class="form-control" id="inputEstado" type="text" :value="estado" maxlength="2" name="estado" readonly/>
        </div>
      </div>
    </div>                           
</div>
</template>

<script>

export default{
  props:['user'],

  data(){
    return{
    cep: this.user.cep,
    endereco: {},
    naoLocalizado:false,
    logradouro: this.user.logradouro,
    numero: this.user.numero,
    complemento: this.user.complemento,
    bairro: this.user.bairro,
    cidade: this.user.cidade,
    estado: this.user.estado,
    }

  },

  methods: {

    buscar: function(){
		let cepNumber = jQuery(this.$refs.cep).val().replace('-', '');
      	
      	this.naoLocalizado = false;

      if (!isNaN(cepNumber) && cepNumber.length === 8) {
        $.getJSON("https://viacep.com.br/ws/" + cepNumber + "/json/", function(endereco) 
        {
          if (endereco.erro) {
            this.endereco={};
            $('#inputLogradouro').focus();
            this.naoLocalizado = true;
            return;
          }

          this.endereco = endereco;

          console.log(endereco);

          $('#inputNumero').focus();

        }.bind(this));
      }
    }
  },

}
</script>