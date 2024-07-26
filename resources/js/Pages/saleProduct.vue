<script setup>
import { useForm, Head } from "@inertiajs/vue3"
import baseForm from "@/components/baseForm.vue"

const props = defineProps({
    productoId:Number,
    nombreProducto:String,
    errors:Object
})

const form = useForm({
    nombre:null,
    cedula:null,
    banco:null,
    clave:null,
    cantidad:null,
    productoId:props.productoId
})

function enviarFormulario() {

    form.post(`/finish-sale/${props.productoId}`)
    
}

</script>

<template>
    <Head :title="`Vender ${nombreProducto}`"></Head>
    <v-app>
        <v-main>
            <baseForm :options="{'titulo':'Cambiar imagen del producto', 'enviarFormulario':enviarFormulario, 
            'boton':'Finalizar compra'}">
                <v-text-field label="Nombre" variant="outlined" 
                type="text" v-model="form.nombre" :errorMessages="errors.nombre"/>
                    
                <v-text-field label="Cedula" variant="outlined" 
                type="text" v-model="form.cedula" :errorMessages="errors.cedula"/>
                   
                    
                <v-text-field label="Banco" variant="outlined" 
                type="text" v-model="form.banco" :errorMessages="errors.banco"/>
                    

                <v-text-field label="Cantidad" variant="outlined" 
                type="text" v-model="form.cantidad" :errorMessages="errors.cantidad"/>

            </baseForm>
        </v-main>
    </v-app>

</template>