<template>
    <div style=" width:100%">
        <div class="d-flex flex-column justify-content-center">
        
            <div class="d-flex justify-content-center">
                <b-button @click="mostrarDetalhes" class="m-1">Detalhes</b-button>
                <b-button @click="mostrarAtividades" class="m-1">Atividades</b-button>
                <b-button @click="mostrarSocios" class="m-1">Sócios</b-button>
            </div>

            <div v-if="detalhes" class="mt-3" >

                <campo-valor :titulo="'CNPJ'"                       :valor="empresa.cnpj"></campo-valor>
                <campo-valor :titulo="'Nome'"                       :valor="empresa.nome"></campo-valor>
                <campo-valor :titulo="'Descrição'"                  :valor="empresa.descricao"></campo-valor>
                <campo-valor :titulo="'Data da abertura'"           :valor="empresa.data_abertura"></campo-valor>
                <campo-valor :titulo="'Data ultima atualização'"    :valor="empresa.data_ultima_atualizacao"></campo-valor>
                <campo-valor :titulo="'Telefone'"                   :valor="empresa.telefone"></campo-valor>
                <campo-valor :titulo="'Telefone Secundário'"        :valor="empresa.telefone_secundario"></campo-valor>
                <campo-valor :titulo="'Logradouro'"                 :valor="empresa.endereco.logradouro"></campo-valor>
                <campo-valor :titulo="'Descrição Logradouro'"       :valor="empresa.endereco.descricao_logradouro"></campo-valor>
                <campo-valor :titulo="'Número'"                     :valor="empresa.endereco.numero"></campo-valor>
                <campo-valor :titulo="'Complemento'"                :valor="empresa.endereco.complemento"></campo-valor>
                <campo-valor :titulo="'Bairro'"                     :valor="empresa.endereco.bairro"></campo-valor>
                <campo-valor :titulo="'CEP'"                        :valor="empresa.endereco.cep"></campo-valor>
                <campo-valor :titulo="'UF'"                         :valor="empresa.endereco.uf"></campo-valor>
     
            </div>
            <div v-if="atividades" class="mt-3">
                <b-table striped hover :items="empresa.atividades" :fields="fieldsAtividades" ></b-table>
            </div>
            <div v-if="socios" class="mt-3">
                <b-table striped hover :items="empresa.socios" :fields="fieldsSocios"></b-table>
            </div>

        </div>

    </div>
</template>

<script>

	import campoValor from './campoValor.vue'

    export default {
        props: ["empresa"],
        data(){
            return {

                detalhes: true,
                atividades: false,
                socios: false,

                fieldsAtividades: [{key: 'codigo', label: 'Código'}, {key:'descricao', label: 'Descrição'}],
                fieldsSocios: [{key: 'cnpj', label: 'CNPJ'}, {key:'nome', label:'Nome'}]

            }
        },
        components: {
            campoValor
        },
        methods: {
            mostrarDetalhes(){
                this.detalhes = true;
                this.atividades = false;
                this.socios = false;
            },
            mostrarAtividades(){
                this.detalhes = false;
                this.atividades = true;
                this.socios = false;
            },
            mostrarSocios(){
                this.detalhes = false;
                this.atividades = false;
                this.socios = true;
            }
        }
	}
</script>

<style>
</style>