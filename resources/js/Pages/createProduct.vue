<script setup>
import { useForm } from '@inertiajs/vue3'

defineProps({
    errors:Object
})

const form = useForm({
    codigo:null,
    nombre:null,
    imagen:null,
    cantidad:null,
    precio:null
})

function enviarFormulario() {
    form.post("/store-product")
}

function subirArchivo(event) {
    form.imagen = event.target.files[0]
}

</script>

<template>
    <v-app>
        <v-main>
            <v-sheet class="mx-auto d-flex justify-center flex-column mt-8 px-10" 
            width="500" height="570">
                <h1 class="text-center mb-4 head-title">Crear Producto</h1>
                <v-form @submit.prevent="enviarFormulario"  class="d-flex justify-center flex-column">
                    
                    <v-text-field label="Código" variant="outlined" 
                    type="text" v-model="form.codigo" :errorMessages="errors.codigo"/>
                
                    <v-text-field label="Nombre" variant="outlined" 
                    type="text" v-model="form.nombre" :errorMessages="errors.nombre"/>
                    
                    <v-file-input @input="(e) => subirArchivo(e)" variant="outlined"
                    label="Subir imagen" prepend-icon="" :errorMessages="errors.imagen">
                    </v-file-input>
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    
                    <v-text-field label="Cantidad" variant="outlined"
                    type="text" v-model="form.cantidad" :errorMessages="errors.cantidad"/>

                    <v-text-field label="Precio" variant="outlined" 
                    type="text" v-model="form.precio" :errorMessages="errors.precio"/>

                    <v-btn color="primary" type="submit" class="mt-4">
                        guardar
                    </v-btn>
                </v-form>
                
            </v-sheet>
        </v-main>
    </v-app>
</template>

<style scoped>
</style>