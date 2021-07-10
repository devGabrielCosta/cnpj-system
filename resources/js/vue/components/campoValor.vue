<template>
    <b-input-group :prepend="titulo">
        <b-form-input v-model="valor" disabled style="background-color: white;"></b-form-input>
    </b-input-group>
</template>

<script>
    export default{
        props: ["titulo", "valor"]
    }
</script>