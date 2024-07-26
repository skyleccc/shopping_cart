<template>
  <div>
    <Header />
    <b-container fluid class="my-5">
      <b-row class="justify-content-center">
        <b-col md="8" lg="6" xl="4">
          <b-card class="p-4 custom-card">
            <h1 class="text-center font-weight-bold mb-4">
              {{ userFname }} {{ userLname }}'s Shopping Cart
            </h1>
            <b-list-group>
              <CartItem
                v-for="item in cartItems"
                :key="item.id"
                :item="item"
                @update-quantity="updateQuantity"
              />
            </b-list-group>
            <CartSummary :totalPrice="totalPrice" class="mt-4" />
          </b-card>
        </b-col>
      </b-row>
    </b-container>
  </div>
</template>

<script>
import Header from './Header.vue';
import CartItem from './CartItem.vue';
import CartSummary from './CartSummary.vue';

export default {
  components: {
    Header,
    CartItem,
    CartSummary
  },
  data() {
    return {
      userFname: '',
      userLname: '',
      cartItems: []
    };
  },
  created() {
    this.userFname = document.getElementById('app').dataset.userFname;
    this.userLname = document.getElementById('app').dataset.userLname;
    this.cartItems = JSON.parse(document.getElementById('app').dataset.cartItems);
  },
  computed: {
    totalPrice() {
      return this.cartItems.reduce((total, item) => total + item.cartPriceEach * item.cartQuantity, 0).toFixed(2);
    }
  },
  methods: {
    updateQuantity({ itemId, amount }) {
      const item = this.cartItems.find(item => item.id === itemId);
      if (!item) return;

      const newQuantity = item.cartQuantity + amount;
      if (newQuantity < 0) return;

      $.ajax({
        url: '/cart/update',
        method: 'POST',
        data: {
          itemId: itemId,
          quantity: newQuantity,
          _token: $('meta[name="csrf-token"]').attr('content')  // Get CSRF token from meta tag
        },
        success: (response) => {
          if (response.success) {
            if (newQuantity === 0) {
              this.cartItems = this.cartItems.filter(item => item.id !== itemId);
            } else {
              item.cartQuantity = newQuantity;
            }
          } else {
            console.error('Failed to update cart');
          }
        },
        error: () => {
          console.error('Error during AJAX request');
        }
      });
    }
  }
}
</script>

<style scoped>
.custom-card {
  background-color: #f8f9fa; 
  box-shadow: 0 4px 8px rgba(0,0,0,0.2); 
}
</style>
