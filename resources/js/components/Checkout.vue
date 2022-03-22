<template>
    <div>
        <p>hello from checkout.vue</p>

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
            axios.get('/checkout', {
                params: {
                    cart: sessionStorage.getItem('cart')
                }
            })
                .then(response => {
                    this.cart = response.data
                })
        },

        methods:{

        },

        computed:{
            
        }
    }
</script>