<template>
    <div>
        <di v-if="cart && cart.products.length">
            <ul>
            <li>subtotal: {{ cart.subTotalFormat }}</li>
            <li>shipping costs: {{ cart.shippingRateFormat }}</li>  
            <li>total: {{ cart.totalFormat }}</li>
            </ul>
            <div class="row">
                <div class="col">
            <h3>user info: </h3>
            <ul><span class="boldorder">First and last name:</span>
                <li>{{cart.user.first_name}} {{cart.user.last_name}}</li>
                <span class="boldorder">Delivery adress:</span>
                <li>{{ cart.user.delivery_address.address }}</li>
                <span class="boldorder">City:</span>
                <li>{{ cart.user.delivery_address.address }}</li>
                <span class="boldorder">Contact:</span>
                <li><span>phone number: </span>{{ cart.user.phonenr }} </li>
                <li><span>e-mail: {{ cart.user.email }}</span></li>
            </ul>
            </div>
            <div class="col">
            <h3 >Your purchases:</h3>
            <ul v-for="product in cart.products">
                <span class="boldorder">{{product.name}}</span>
                <li><span>price:</span> {{product.price}}</li>
                <li><span>quantity:</span> {{product.cart_quantity}}</li>
            </ul>
            <button @click="checkout">submit order</button>
            </div>
        </div>
        
        </di>
    </div>
    
</template>

<script>
import BestSellers from './BestSellers.vue'
    export default {
  components: { BestSellers },
        data() {
            return {
                cart: null,
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