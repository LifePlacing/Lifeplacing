<template>
<div class="form-group row align-items-center">
        <div class="col-md-4 media">    
            <img :src="foto" class="img-fluid thumb" alt="Foto do Perfil"> 
        </div>
        <div class="col-md-8">            
            <input type="file" class="form-control-file" name="foto" aria-describedby="file" @change="getimage"> 
        </div>
</div>  
</template>

<script>
    export default {

        props:['user'],



        data(){

            return {

                  foto: "uploads/avatars/"+this.user.id+"/"+this.user.foto
            }
        },

        methods:{

        getimage(e){
                let image = e.target.files[0]
                let reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = (e) => {
                    this.foto = e.target.result;
                }
        }   

    }

    }
    
</script>      