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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        products:[],
        isActive: false,
        productsForCart: JSON.parse(sessionStorage.getItem('numberincart'))
    },

   created(){
       axios.get('products/show').then(response => {this.products = response.data
        let numberincart = []
        for(let i=0; i<this.products.length; i++){
            this.products[i].quantity = 0
            numberInCart.length = this.products.length + 1
            numberInCart[i]={
                quantity: 0,
                id: i
            }
        sessionStorage.setItem('numberincart', JSON.stringify(numberincart))
        }})
      
   },
   mounted(){

    }
    
   },
);
