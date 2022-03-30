<template>
  <div>
    <div class="navbar-brand display-in-row">
      <div class="example spacing link-right">
        <a
          v-if="logged_in === false"
          class="nav-link hover hover-1"
          href="/login"
          >Log in</a
        ><a href="/login">
          <svg
            v-if="logged_in === true"
            xmlns="http://www.w3.org/2000/svg"
            width="30"
            height="30"
            fill="currentColor"
            class="bi bi-person-circle"
            viewBox="0 0 16 16"
          >
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path
              fill-rule="evenodd"
              d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
            /></svg
        ></a>
      </div>
      <div class="link-right" @click="isActive = !isActive">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="30"
          height="30"
          fill="currentColor"
          class="bi bi-handbag link-right position-the-bag"
          viewBox="0 0 16 16"
        >
          <path
            d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"
          />
        </svg>
        <div v-if="cart && cart.length>0" class="numberCircle">{{cart.length}}</div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <img id="logo" src="https://i.ibb.co/jDN8ddD/puffin-tea-logo.png" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <div class="example spacing">
              <a
                class="nav-link hover hover-1 first-link"
                aria-current="page"
                href="/products"
                >All Product</a
              >
            </div>
            <div class="example spacing">
              <a class="nav-link hover hover-1" href="/help">Help Center</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="position-right-flex">
      <div class="cart" :class="{ toggleCart: !isActive }">
        <svg
          @click="isActive = !isActive"
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          fill="currentColor"
          class="bi bi-x-circle-fill"
          viewBox="0 0 16 16"
          id="change-the-position"
        >
          <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"
          />
        </svg>
        <h3>Cart</h3>
        <hr />
        <div v-for="product in cart_no_repetition" class="row" id="row-width">
          <div class="column">
            <img
              class="tinypic"
              :src="imagePath + products[product - 1].main_image.filename"
            />
          </div>
          <div class="column" id="display-basket-description">
            <div id="cartitems-margin-right">
              <p>{{ products[product - 1].name }}</p>
              <p>{{ products[product - 1].price }} &#8364;</p>
              <div class="quantity">
                <a
                  href="#"
                  v-on:click="
                    deleteFromCart(product);
                    decrement(products[product - 1].id);
                    deleteFromCartNoRep(cart_no_repetition.indexOf(product));
                  "
                  class="quantity__minus"
                >
                  <span>-</span>
                </a>
                <input
                  name="quantity"
                  type="text"
                  class="quantity__input"
                  :value="products_for_cart[product].quantity"
                />
                <a
                  href="#"
                  v-on:click="plusToCart(cart_no_repetition.indexOf(product))"
                  class="quantity__plus"
                >
                  <span>+</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <h6>Total price: {{ arraySum }} &#8364;</h6>
        <hr>
        <div class="example spacing to-center no-padding check-out">
          <a v-if="cart" class="hover hover-1 first-link" id="checkout-link" href="/checkout">check out</a>
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
      isActive: false,
    };
  },
  props: {
    products: {
      required: true,
      type: Array,
    },
    cart_no_repetition: {
      type: Array,
    },
    cart: {
      type: Array,
    },
    products_for_cart: {
      type: Array,
    },
    logged_in: {
      type: Boolean,
    },
  },
  methods: {
    plusToCart(id) {
      this.$emit("cartplus", id);
    },
    deleteFromCart(item) {
      this.$emit("delete-from-cart", item);
    },
    decrement(id) {
      this.$emit("cart-minus", id);
    },
    deleteFromCartNoRep(id) {
      if (this.products_for_cart[this.cart_no_repetition[id]].quantity < 1) {
        this.cart_no_repetition.splice(id, 1);
      }
      sessionStorage.setItem(
        "uniqueProducts",
        JSON.stringify(this.cart_no_repetition)
      );
    },
  },

  computed: {
    arraySum() {
      if (this.cart != null) {
        let total = 0;
        let newString = this.cart.map((i) => this.products[i - 1].price);
        for (let j = 0; j < newString.length; j++) {
          total = total + parseFloat(newString[j]);
        }
        return total.toFixed(2);
      } else {
        return 0;
      }
    },
  },
};
</script>