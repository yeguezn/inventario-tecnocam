<script setup>
import { Link } from "@inertiajs/vue3"

const props = defineProps({
    message:String
})

</script>

<template>
    <div class="d-flex flex-column align-center mt-15">

        <h1>{{props.message}}</h1>
        <v-btn class="mt-5">
            <Link href="/" as="button">Volver al inicio</Link>
        </v-btn>

    </div>
</template>