<template>
    <div class="product-detail-container">

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-6 bg-indigo text-white">
                              
                                 
                                   <div class="flex-to-center">
                                    <img class="product-detail-main-image" :src="imagePath + product.images[0].filename">
                                    </div>

                            </div>
                            <div class="col-lg-6 ">
                                <h3 class="detail-title">{{product.name}}</h3>
                                <p class="detail-desciption">{{product.description}}</p>
                                    <div class="flex-to-center ">
                                    <div v-for="image in product.images" class="grid detail-images">
                                    <img class="tiny-image-products" :src="imagePath + image.filename">
                                   </div>
                                   
                                </div>
                                     
                                            <p id="detail-price" v-if="product.on_sale" >Price:<span class="cross-out-sale"> &euro;{{product.price}}</span><span class="detail-price-weight">&euro;{{product.on_sale.price}}</span> </p>
                                            <p id="detail-price"  v-else>Price:<span class="detail-price-weight"> &euro;{{product.price}}</span></p>
                                     <div class= "flex-to-center button-detail-page">
                                         
                                    <button  v-on:click="addToCart(product.id)" class="btn btn-light btn-lg" data-mdb-ripple-color="dark">Buy</button>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-4 pb-2">

                                        </div>
                                        <div class="col-md-6 mb-4 pb-2">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    </div>
</div>

    
</template>

<script>
    export default {
        data(){
            return{
                imagePath: "/images/"
            }
        },
        props:{
            product:{
                type:Object,
                required:true,
            }
        },
        methods:{
                addToCart(id) {
                 this.$emit("add-to-cart", id);},
        }
    }
</script>
