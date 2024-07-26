<template>
  <b-card class="mb-3" :data-id="item.id">
    <b-row class="align-items-center">
      <b-col cols="auto">
        <b-img :src="item.product.prodImageURL" :alt="item.product.prodName" class="img-thumbnail" />
      </b-col>
      <b-col>
        <div class="font-weight-bold">{{ item.product.prodName }}</div>
        <div class="text-muted">
          Price: ₱ <span class="item-price" :data-price="item.cartPriceEach">{{ item.cartPriceEach }}</span>
        </div>
      </b-col>
      <b-col cols="auto" class="d-flex align-items-center">
        <b-button @click="updateQuantity(item.id, -1)" variant="danger" class="mr-2">-</b-button>
        <span class="quantity mx-3">{{ item.cartQuantity }}</span> 
        <b-button @click="updateQuantity(item.id, 1)" variant="success" class="ml-2">+</b-button>
      </b-col>
    </b-row>
  </b-card>
</template>

<script>
export default {
  props: ['item'],
  methods: {
    updateQuantity(itemId, amount) {
      this.$emit('update-quantity', { itemId, amount });
    }
  }
}
</script>

<style scoped>

.img-thumbnail {
  width: 100px; 
  height: 100px; 
  object-fit: cover; 
}

</style>
