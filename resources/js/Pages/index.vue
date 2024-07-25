<script setup>
import ProductCard from '../components/ProductCard.vue'
import navBar from "../components/navBar.vue"
import { Head } from "@inertiajs/vue3"

const props = defineProps({
    productos:Array
})

</script>

<template>
    <Head title="Inventario">
        <link rel="icon" type="image/svg+xml" href="/xcoreico.svg" />
    </Head>
    <v-app>
        <navBar></navBar>
        <v-main>
            <v-container>
                <v-row>
                    <v-col
                    v-for="producto in productos"
                    :key="producto.id"
                    cols="3"
                    >
                        <ProductCard :nombre="producto.nombre" :id="producto.id"
                        :precio="producto.precio" :cantidad="producto.cantidad"
                        :imagen="producto.imagen"/>

                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>