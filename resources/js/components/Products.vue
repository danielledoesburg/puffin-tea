<template>
    <div class="position-categories">
        <div class="categories">
            <h4>Categories</h4>
            <ul>
                <li>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(1).concat()" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Green Tea 
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(2)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Black tea
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(3)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            White Tea
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(4)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Oolong
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(5)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                        Pu Erh
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                         <input class="form-check-input" type="checkbox" :value="filterArray(6)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Matcha
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(7)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Rooibos
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                         <input class="form-check-input" type="checkbox" :value="filterArray(8)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                        Herbal
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" :value="filterArray(9)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                        Gifts
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                         <input class="form-check-input" type="checkbox" :value="filterArray(10)" id="flexCheckIndeterminate"  v-model="filteredItems">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Accesories
                        </label>
                    </div>
                </li>
            </ul>
            <hr>
            <ul>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Leaf
                        </label>
                    </div>
                </li>
                <li>        
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            Bags
                        </label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="right-side">
            <h5>Products</h5>
            <div v-if= "filteredItems.length < 1" class="products-grid">
                <div class="products-card" v-for="product in products">
                
                        <svg v-on:click="addToCart(product.id)"
                            xmlns="http://www.w3.org/2000/svg" 
                            width="30" height="30" 
                            fill="currentColor" 
                            id="change-the-position" 
                            class="bi bi-plus-circle-fill" 
                            viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    
                <img class="products-image" :src="imagePath + product.main_image.filename">
                <p class="price">{{product.price}} &euro;</p>
                <p>{{ product.name }}</p>
                </div>
            </div>
            <div v-else class="products-grid">
                <div class="products-card" v-for="item in unpackedFilteredItems">
                    <svg v-on:click="addToCart(item.id)"
                        xmlns="http://www.w3.org/2000/svg" 
                        width="30" height="30" fill="currentColor" 
                        id="change-the-position"
                        class="bi bi-plus-circle-fill" 
                        viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg>
                <img class="products-image" :src="imagePath + item.main_image.filename">
                <p class="price">{{ item.price }} &euro;</p>
                <p>{{ item.name }}</p>
                </div>
            </div>
        </div>
</div>

</template>

<script>
    export default {
        mounted(){ 

        }, 

        data(){
            return{
                imagePath:'images/',

                filteredItems:[],
                unpackedFilteredItems:[],
            }
        },
        props:{
                products:{
                type:Array,
                required:true,

                },
            },
       methods:{
                addToCart(id) {
                this.$emit('add-to-cart',id)
            },

            filterArray(value){ 
               let unpackedArray= this.products.filter(product =>{
                    return product.category_id==value
                })

            this.unpackedFilteredItems = Array.prototype.concat(...this.filteredItems);
 
            return unpackedArray  

            },


        }
    }
</script>