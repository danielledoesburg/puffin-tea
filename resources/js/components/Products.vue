<template>
    <div class="products-grid">
        <div v-for="product in products">
            <img class="products-image" :src="imagePath + product.images[0].filename">
            <p>{{ product.name }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                imagePath:'images/'
            }
        },
        props:{
                products:{
                type:Array,
                required:true,

                },
            },
    }
</script>