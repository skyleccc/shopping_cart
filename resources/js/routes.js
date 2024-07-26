
import { createRouter, createWebHistory } from 'vue-router';
import ShoppingCart from './components/ShoppingCart.vue';
import Header from './components/Header.vue';
import CartItem from './components/CartItem.vue';
import CartSummary from './components/CartSummary.vue';

const routes = [
    {
        name: 'shopping-cart',
        path: '/',
        component: ShoppingCart
    },
    {
        name: 'header',
        path: '/header',
        component: Header
    },
    {
        name: 'cart-item',
        path: '/cart-item',
        component: CartItem
    },
    {
        name: 'cart-summary',
        path: '/cart-summary',
        component: CartSummary
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;