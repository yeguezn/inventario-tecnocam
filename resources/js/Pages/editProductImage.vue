<script setup>
import { useForm } from '@inertiajs/vue3'
import { Head } from "@inertiajs/vue3"
import baseForm from "@/components/baseForm.vue"

const props = defineProps({
    nombreProducto:String,
    productoId:Number,
    errors:Object
})

const form = useForm({
    imagen:null
})

function enviarFormulario() {
    form.post(`/update-productImage/${props.productoId}`)
}

function subirArchivo(event) {
    form.imagen = event.target.files[0]
}

</script>

<template>
    <Head :title="`Cambiar Imagen de ${props.nombreProducto}`"></Head>
   <v-app>
        <v-main>
            <baseForm :options="{'titulo':'Cambiar imagen del producto', 
            'enviarFormulario':enviarFormulario, 'boton':'guardar'}">
                <v-file-input @input="(e) => subirArchivo(e)" 
                variant="outlined" 
                prepend-icon="" 
                label="Subir nueva imagen" :errorMessages="errors.imagen">
                </v-file-input>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
            </baseForm>
        </v-main>
    </v-app>
</template>