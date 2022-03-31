<template>
    <div class="flex-to-center take-full-page-checkout">
        <div class="checkout-content" v-if="cart && cart.products.length">
            <h4>Check-out</h4>

            <div class="row">
            <div class="col">
            <h3>user info: </h3>
          
            <ul><span class="boldorder">First and last name:</span>
                <li>{{cart.user.first_name}} {{cart.user.last_name}}</li>
                <span class="boldorder">Delivery adress:</span>
                <li><span>Street: </span>{{ cart.user.delivery_address.address }}</li>
                <li><span>City: </span>{{ cart.user.delivery_address.city }}</li>
                <span class="boldorder">Billing adress:</span>
                <li><span>Street: </span>{{ cart.user.billing_address.address }}</li>
                <li><span>City: </span>{{ cart.user.billing_address.city }}</li>
                <span class="boldorder">Contact:</span>
                <li><span>phone number: </span>{{ cart.user.phonenr }} </li>
                <li><span>e-mail: {{ cart.user.email }}</span></li>
            </ul>
            <div class="example no-padding check-out">
            <a  class="hover hover-1 first-link no-decoration smaller-font" href="account/edit
            " >Edit your user info  </a>
            </div>
            </div>
            <div class="col your-purchases">
            <h3 >Your purchases:</h3>
            <div v-for="product in cart.products" class="row">
                <div class="col-md-auto flex-to-center">
                <img class="tinypic" :src="imagePath + product.main_image.filename">
                </div>
                <div class="col">
                <ul>
                    <span class="boldorder">{{product.name}}</span>
                    <li><span>price:</span> {{product.price}}&#8364;</li>
                    <li><span>quantity:</span> {{product.cart_quantity}}</li>
                </ul>
                </div>
            </div>
            <ul class= "total-info-order" >
            <li><span class="boldorder">subtotal: </span>{{ cart.subTotal }}&#8364;</li>
            <li><span class="boldorder">shipping costs:</span> {{ cart.shippingRate }}&#8364;</li>  
            <li><span class="boldorder">total:</span> {{ cart.total }}&#8364;</li>
            </ul>
            <div class="flex-to-center ">
            <button class="btn btn-light btn-lg btn-modal btn-checkout" @click="checkout">submit order</button>
            </div>
            </div>
        </div>
        
        </div>
    </div>
    
</template>

<script>
import BestSellers from './BestSellers.vue'
    export default {
  components: { BestSellers },
        data() {
            return {
                cart: null,
                imagePath: "/images/",
            }
        },

        created() {     
            axios.get('/checkout/calculate', {
                params: {
                    cart: JSON.stringify(JSON.parse(sessionStorage.getItem('numberincart')).filter(function (prod) { 
                        return prod && prod.quantity>0
                        }))
                }
            }).then(response => {
                this.cart = response.data
            })
        },

        methods: {
            checkout: function() {
                axios.post('/checkout', this.cart)
                    .then(response => {
                        sessionStorage.clear()
                        window.location.href = response.data.redirect
                    })
                    .catch (error => console.log('Error while sending error: ', error, '---', error.response.data))
            }
        }
    }
</script>