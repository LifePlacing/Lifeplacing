<template>
<div class="row">
    <div class="media mx-sm-2 mb-4">    
        <img :src="foto" class="img-fluid thumb" alt="Foto do Perfil"> 
    </div>            
    <div class="custom-file mx-sm-2 mb-4">
        <input type="file" name="foto" @change="getimage" lang="pt_BR">     

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