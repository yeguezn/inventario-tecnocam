<script setup>
import { useForm, Head } from "@inertiajs/vue3"

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
            <v-sheet class="mx-auto d-flex justify-center flex-column mt-15 px-5" 
            width="500" height="650">
                <h1 class="text-center mb-4 head-title">Vender Producto {{ props.nombreProducto }}</h1>
                <v-form @submit.prevent="enviarFormulario"  class="d-flex justify-center flex-column">
                    
                    <v-text-field label="Nombre" variant="outlined" 
                    type="text" v-model="form.nombre" :errorMessages="errors.nombre"/>
                    
                    <v-text-field label="Cedula" variant="outlined" 
                    type="text" v-model="form.cedula" :errorMessages="errors.cedula"/>
                   
                    
                    <v-text-field label="Banco" variant="outlined" 
                    type="text" v-model="form.banco" :errorMessages="errors.banco"/>
                    

                    <v-text-field label="Cantidad" variant="outlined" 
                    type="text" v-model="form.cantidad" :errorMessages="errors.cantidad"/>
                   
                    <v-text-field label="Clave" variant="outlined" 
                    type="password" v-model="form.clave"/>

                    <v-btn color="primary" type="submit" class="mt-4">
                        guardar
                    </v-btn>
                </v-form>
                
            </v-sheet>
        </v-main>
    </v-app>

</template>