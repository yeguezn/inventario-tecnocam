<script setup>

defineProps({
    options:Object
})

</script>

<template>
    <v-sheet class="mx-auto d-flex justify-center flex-column mt-8 px-10" 
    width="500" height="570">
        <h1 class="text-center mb-4 head-title">{{options.titulo}}</h1>
        <v-form @submit.prevent="options.enviarFormulario"  class="d-flex justify-center flex-column">
             <slot></slot>

            <v-btn color="primary" type="submit" class="mt-4">
                {{options.boton}}
            </v-btn>
        </v-form>
                
    </v-sheet>
</template>