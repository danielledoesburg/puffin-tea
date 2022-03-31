<template>
    <div id="background-bestsellers">
        <div class="custom-shape-divider-top-1646675955">
            <svg
                data-name="Layer 1"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill1">
            </path>
            </svg>
        </div>
        <h1>Best Sellers</h1>
        <div class="to-center">
            <div class="responsive">
                <div v-for="product in products" class="product-in-carousel">
                    <a :href="'/products/' + product.slug">
                    <img
                        class="small-image"
                        :src="imagePath + product.main_image.filename"/></a>
                    <p>{{ product.name }}</p>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            imagePath: "images/",
        };
    },
    props: {
        products: {
            type: Array,
            required: true,
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
