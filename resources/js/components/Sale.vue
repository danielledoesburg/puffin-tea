<template>
  <div class="grid-wrapper">
    <div v-for="product in onSaleShorten" class="grid-object">
      <a :href="'/products/' + product.slug">
      <img
        class="resize-image"
        :src="imagePath + product.main_image.filename"
      />
      </a>
      <div id="description-padding">
        <p>{{ product.name }}</p>
        <div class="to-center">
          <p class="old-price">{{ product.price }}</p>
          <p class="new-price">{{ product.on_sale.price }} &#8364;</p>
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
      onSaleShorten: [],
    };
  },
  mounted() {
    this.onSaleShorten = this.products.slice(0, 3);
  },
  props: {
    products: {
      type: Array,
      required: true,
    },
  },
};
</script>
