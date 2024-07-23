<script setup>
import { Link } from "@inertiajs/vue3"

const props = defineProps({
    nombre:String,
    id:Number,
    precio:Number,
    cantidad:Number,
    imagen:String
})

</script>

<template>
    <v-card height="400px" width="280px">

        <v-hover v-slot="{ isHovering, props }">
            <v-card v-bind="props">
                <v-img
                :src="`uploads/${imagen}`"
                height="215px" width="280px" cover title="Cambiar imagen"
                >
                </v-img>
                <v-overlay
                :model-value="isHovering"
                class="align-center justify-center"
                scrim="#00000090"
                contained
                >
                    <Link :href="`/edit-productImage/${nombre}/${id}`">
                        <v-btn variant="flat">Cambiar imagen</v-btn>
                    </Link>
                </v-overlay>
            </v-card>
        </v-hover>
        <v-card-title>
            {{props.nombre}}
        </v-card-title>

        <v-card-text>
            <p class="mb-2">
                <v-chip>${{ props.precio }}</v-chip>
            </p>
            <v-chip>Cantidad: {{ props.cantidad }}</v-chip>
        </v-card-text>

        <v-card-actions>
            <v-btn>
                <Link :href="`/delete-product/${props.id}`"
                method="delete" as="button">
                    Eliminar
                </Link>
            </v-btn>

            <v-btn>
                <Link :href="`/edit-product/${props.id}`"
                as="button">
                    Editar
                </Link>
            </v-btn>

            <v-btn v-if="props.cantidad >= 1">
                <Link :href="`/sale-product/${props.nombre}/${props.id}`"
                as="button">
                    Vender
                </Link>
            </v-btn>
        </v-card-actions>

    </v-card>
</template>