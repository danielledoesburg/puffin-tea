/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');
require('./slick');
require('./multiple-items-carousel');


window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('shopping-card', require('./components/ShoppingCard.vue').default);
Vue.component('bestsellers', require('./components/BestSellers.vue').default);
Vue.component('sale', require('./components/Sale.vue').default);
Vue.component('header-carousel', require('./components/HeaderCarousel.vue').default);
Vue.component('products', require('./components/Products.vue').default);
Vue.component('navbar-and-cart', require('./components/NavbarAndCart.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
   

    data:{
        products:[],
        cart:JSON.parse(sessionStorage.getItem('cart')),
        products_for_cart: JSON.parse(sessionStorage.getItem('numberincart')),
        cart_no_repetition: JSON.parse(sessionStorage.getItem("uniqueProducts")),
    },
    mounted(){    
        let bob= [];
        if (JSON.parse(sessionStorage.getItem("cart")) == null) {
        sessionStorage.setItem("cart", JSON.stringify(bob))
        }
        if(JSON.parse(sessionStorage.getItem("uniqueProducts"))==null){
        sessionStorage.setItem("uniqueProducts", JSON.stringify(bob))
        }

    },

    created(){
        axios.get('products/show').then(response => {
            this.products = response.data
            //here i should put an if statement if session stotage is empty
            let numberincart = []
            for(let i=0; i<this.products.length; i++){
                this.products[i].quantity = 0
                numberincart.length = this.products.length + 1
                numberincart[i]={
                    quantity: 0,
                    id: i
                }
            sessionStorage.setItem('numberincart', JSON.stringify(numberincart))
            }
        })
      
   },

    methods: {
        updateCart(id){
            id = parseInt(id)
            this.cart.push(id)
            this.products_for_cart[id].quantity = this.products_for_cart[id].quantity + 1
            sessionStorage.setItem('cart', JSON.stringify(this.cart))
            sessionStorage.setItem('numberincart', JSON.stringify(this.products_for_cart))
            let unique= {}
            this.cart.forEach(function(i){
                if(!unique[i]){
                    unique[i]= true;
                }
            })
            this.cart_no_repetition = Object.keys(unique);
            sessionStorage.setItem("uniqueProducts",JSON.stringify(this.cart_no_repetition))
        },

  
        plusToCart(id){
            let addedProduct  = this.cart_no_repetition.slice(id,id+1)
            let addedProductNumber = parseInt(addedProduct[0])
            this.cart.push(addedProductNumber)
            this.products_for_cart[addedProductNumber].quantity = this.products_for_cart[addedProductNumber].quantity +1
            sessionStorage.setItem("cart", JSON.stringify(this.cart))
            sessionStorage.setItem("numberincart", JSON.stringify(this.products_for_cart))
        },

        deleteFromCart(item){
            let itemNum = parseInt(item)
            const index = this.cart.indexOf(itemNum);
            if (index > -1){
                this.cart.splice(index, 1);
            }
            sessionStorage.setItem("cart", JSON.stringify(this.cart))
          },
                
        decrement(id){
            if (this.products_for_cart[id].quantity > 0){
                this.products_for_cart[id].quantity= this.products_for_cart[id].quantity - 1
            }
            else {
                this.products_for_cart[id].quantity=0
            }
            sessionStorage.setItem("numberincart",JSON.stringify(this.products_for_cart))
        },
        



   }
}
);
