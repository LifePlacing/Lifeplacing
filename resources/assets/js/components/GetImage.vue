<template>
<div class="form-group row align-items-center">
        <div class="col-md-4 media">    
            <img :src="avatar" class="img-fluid thumb" alt="Foto do Perfil"> 
        </div>
        <div class="col-md-8">            
            <input type="file" class="form-control-file" name="foto" aria-describedby="file" @change="GetImage">                               
 
        </div>
</div>  
</template>

<script>
    export default {

        data(){
            return{
                avatar:null
            }
        },

        methods:{

        GetImage(e){

            let image = e.target.files[0]
            let reader = new FileReader();
            reader.imageDataURL(image);
            reader.onload = e =>{
                this.avatar = e.target.result
            }
        },

        upload(){        
             axios.post('/upload');
        }
        
    }
    }
</script>
