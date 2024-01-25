import Vue from 'vue'
import VueRouter from 'vue-router'
import Dice from './pages/Dice.vue'
import Mines from './pages/Mines.vue'
import Bubbles from './pages/Bubbles.vue'
import Wheel from './pages/Wheel.vue'
import Allin from './pages/Allin.vue'
import Blackjack from './pages/Blackjack.vue'
import Slots from './pages/Slots.vue'
import Slot from './pages/Slot.vue'
import Bonus from './pages/Bonus/Bonus.vue'
import Promo from './pages/Promo.vue'
import Ref from './pages/Ref.vue'
import Faq from './pages/Faq.vue'
import Terms from './pages/Terms.vue'
import Policy from './pages/Policy.vue'
import Payment from './pages/Payment.vue'
import Withdraw from './pages/Withdraw.vue'
import Main from './pages/Main.vue'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'main',
        component: Main
    },
    {
        path: '/dice',
        name: 'dice',
        component: Dice
    },
    {
        path: '/mines',
        name: 'mines',
        component: Mines
    },
    {
        path: '/bubbles',
        name: 'bubbles',
        component: Bubbles
    },
    {
        path: '/wheel',
        name: 'wheel',
        component: Wheel
    },
    {
        path: '/allin',
        name: 'allin',
        component: Allin
    },
    {
        path: '/blackjack',
        name: 'blackjack',
        component: Blackjack
    },
    /*{
        path: '/slots',
        name: 'slots',
        component: Slots
    },
    {
        path: '/slots/game/:id/:type?',
        name: 'slot',
        component: Slot
    },*/
    {
        path: '/ref',
        name: 'ref',
        component: Ref
    },
    {
        path: '/bonus',
        name: 'bonus',
        component: Bonus
    },
    /*{
        path: '/promo',
        name: 'promo',
        component: Promo
    },*/
    {
        path: '/pay',
        name: 'payment',
        component: Payment
    },
    {
        path: '/withdraw',
        name: 'withdraw',
        component: Withdraw
    },
    {
        path: '/faq',
        name: 'faq',
        component: Faq
    },
    {
        path: '/terms',
        name: 'terms',
        component: Terms
    },
    {
        path: '/policy',
        name: 'policy',
        component: Policy
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
