<script setup>
import { useForm } from '@inertiajs/vue3'
import { Head } from "@inertiajs/vue3"
import baseForm from "@/components/baseForm.vue"

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

            <baseForm :options="{'titulo':'Editar producto', 'enviarFormulario':enviarFormulario, 
            'boton':'guardar'}">
                <v-text-field label="Código" variant="outlined" 
                type="text" v-model="form.codigo" :errorMessages="errors.codigo"/>
                    
                <v-text-field label="Nombre" variant="outlined" 
                type="text" v-model="form.nombre" :errorMessages="errors.nombre"/>
                    
                <v-text-field label="Cantidad" variant="outlined" 
                type="text" v-model="form.cantidad" :errorMessages="errors.cantidad"/>

                <v-text-field label="Precio" variant="outlined" 
                type="text" v-model="form.precio" :errorMessages="errors.precio"/>

            </baseForm>
           
        </v-main>
    </v-app>
</template>