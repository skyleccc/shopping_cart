<template>
  <div class="d-flex flex-column align-items-end">
    <h2 class="h4 font-weight-bold">
      Total: ₱ <span id="total-price">{{ totalPrice }}</span>
    </h2>
    <b-button @click="checkout" variant="primary" class="mt-3">
      Proceed to Checkout
    </b-button>
  </div>
</template>

<script>
export default {
  props: ['totalPrice'],
  methods: {
    checkout() {
      alert('Redirect to checkout page....');
    }
  }
}
</script>

<style scoped>
</style>