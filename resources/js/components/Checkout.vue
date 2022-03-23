<template>
    <div>
        <div v-if="cart.products.length">
            <p>subtotal: {{ cart.subTotalFormat }}</p>
            <p>shipping costs: {{ cart.shippingRateFormat }}</p>  
            <p>total: {{ cart.totalFormat }}</p>  
            <p>user info: {{ cart.user }}</p>
            <p>products: {{ cart.products }}</p>
            <button @click="checkout">submit order</button>
        </div>
        <div v-else>nothing to see here</div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cart: null
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