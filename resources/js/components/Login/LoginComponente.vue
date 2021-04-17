<template>
    <div class="container">
        <div class="card">
            <div class="card-body justify-content-center">
                <p v-if="errors.length">
                    <b>Atenção, o(s) seguinte(s) campos não podem estar em branco:</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </p>
                <form id="formLogin" @submit="checkForm" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="usuario">Nome</label>
                            <input id="usuario" v-model="usuario" name="usuario" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="senha">Senha</label>
                            <input id="senha" v-model="senha" name="senha" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                            <button type="button" class="btn btn-outline-primary" @click="clearField">Limpar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        
        data: function(){
            return {
                errors: [],
                usuario: null,
                senha: null

            }
        },
        methods: {
            checkForm: function (e) {

                this.errors = [];
                let errors = this.errors;

                e.preventDefault();

                if(!this.usuario && !this.senha){
                    this.errors.push('O campo usuário não pode estar vazio.');
                    this.errors.push('O campo senha não pode estar vazio.');
                } else if (!this.usuario) {
                    this.errors.push('O campo usuário não pode estar vazio.');
                } else if (!this.senha) {
                    this.errors.push('O campo senha não pode estar vazio.');
                } else{

                    
                    axios.post('/Login/Autenticar', "nome=" + this.usuario + "&senha=" + this.senha).then((response) => {
                        let token = response.data["access_token"];
                        window.location = "/"   ;
                    }).catch(function (error) {
                        let response = error.request;
                        if(response.status == "401"){
                            alert(response.response);
                        } else{
                            alert("Ocorreu um erro inesperado durante a tentativa de login.");
                            console.log(response);
                        }
                    });

                }

            },

            clearField: function(e){
                this.usuario = "";
                this.senha = "";
            }
        }
    };
    

</script>