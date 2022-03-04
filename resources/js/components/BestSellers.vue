<template>
    </div>
    <div class="grid-wrapper">
      <div class="grid-object">
        <img class= "resize-image" src="images/giftset1.jpg">
        <p>bhjbsadhashdgjhasd</p>
        </div>
        <div class="grid-object">
          <img class= "resize-image" src="images/orteabeauty1.jpg">
          <p>bhjbsadhashdgjhasd</p>
        </div>
        <div class="grid-object">
          <img class= "resize-image" src="/images/goodandproperoolong1.jpg">
          <p>bhjbsadhashdgjhasd</p>
        </div>
    </div>
</template>

<script>
    export default {
      props:{
        products:{
          type:Array,
          required:true,

        },
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
