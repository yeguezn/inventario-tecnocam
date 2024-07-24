<script setup>
import { useForm } from '@inertiajs/vue3'
import { Head } from "@inertiajs/vue3"

const props = defineProps({
    producto:Object,
    errors:Object
})

const form = useForm({
    codigo : props.producto.codigo,
    nombre : props.producto.nombre,
    cantidad : props.producto.cantidad,
    precio : props.producto.precio
})

function enviarFormulario() {
    form.put(`/update-product/${props.producto.id}`)
}

</script>

<template>
    <Head title="Editar Producto"></Head>
    <v-app>
        <v-main>
            <v-sheet class="mx-auto d-flex justify-center flex-column mt-10 px-5" 
            width="500" height="550">
                <h1 class="text-center mb-4 head-title">Editar Producto</h1>
                <v-form @submit.prevent="enviarFormulario"  class="d-flex justify-center flex-column">
                    
                    <v-text-field label="Código" variant="outlined" 
                    type="text" v-model="form.codigo" :errorMessages="errors.codigo"/>
                    
                    <v-text-field label="Nombre" variant="outlined" 
                    type="text" v-model="form.nombre" :errorMessages="errors.nombre"/>
                    
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