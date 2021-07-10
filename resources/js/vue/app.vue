<template>
	<b-container fluid style="height:100vh">
		<b-row>
			<b-col></b-col>
			<b-col cols="8" style="height:100vh" >

  <b-alert show variant="danger" v-if="textoAlerta">{{textoAlerta}}</b-alert>

				<b-row class="d-flex justify-content-center" style="margin-top: 100px;" cols="2">
					<b-input-group>
						<b-form-input v-model="pesquisa" type="search" sm="3" @keypress="isNumber($event)" @change="isNumber($event)" maxlength=14></b-form-input>
						<b-input-group-append>
							<b-button variant="outline-secondary" @click="fazerPesquisa" >Button</b-button>
						</b-input-group-append>
					</b-input-group>
				</b-row>

				<b-row class="mt-3">
					<tabela-empresa v-if="empresa" :empresa="empresa"></tabela-empresa>
				</b-row>

			</b-col>
			<b-col></b-col>
		</b-row>
	</b-container>
</template>

<script>

	import TabelaEmpresa from './components/TabelaEmpresa.vue'

    export default {	
        data(){
            return {
                pesquisa: '12467730000186',
                empresa: false,
				textoAlerta: false
            }
        },
		components: {
			TabelaEmpresa
		},
		methods: {
			isNumber: function(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
					evt.preventDefault();;
				} else {
					return true;
				}
			},
			fazerPesquisa(){

				if(String(this.pesquisa).length != 14){ 
					this.textoAlerta = "Deve ser digitado exatamente 14 números";
					return false;
				}

				axios.get('/api/search/'+this.pesquisa)
					.then((resource) =>{
						this.empresa = resource.data.response;
						this.textoAlerta = false;
					})
					.catch( (error) => {
					this.textoAlerta = "A empresa não pode ser encotrada";
					})
            }
		}
	}
</script>

<style>
</style>