<script setup>
import { useForm, Head } from '@inertiajs/vue3'
import baseForm from "@/components/baseForm.vue"

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
    <Head title="Nuevo producto"></Head>
    <v-app>
        <v-main>
            <baseForm :options="{'titulo':'Crear producto', 'enviarFormulario':enviarFormulario, 
            'boton':'guardar'}">
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
            </baseForm>
        </v-main>
    </v-app>
</template>

<style scoped>
</style>