<template>
    <div class="header">
        <div class="container rows align-items-center">
            <div class="header-menu rows" v-if="showMenu || $mq.desktop">
                <div
                    :class="['item', {'isActive': page == 'main'}]"
                    @click="$root.$emit('open', 'main')"
                    @click="$root.$emit('toggleMenu')"
                >
                    Главная
                </div>
                <div
                    :class="['item', {'isActive': page == 'ref'}]"
                    @click="$root.$emit('open', 'ref')"
                    @click="$root.$emit('toggleMenu')"
                    v-if="$root.user"
                >
                    Рефералы
                </div>
                <div
                    :class="['item', {'isActive': page == 'bonus'}]"
                    @click="$root.$emit('open', 'bonus')"
                    @click="$root.$emit('toggleMenu')"
                    v-if="$root.user"
                >
                    Бонусы
                </div>
                <div
                    :class="['item', {'isActive': page == 'promo'}]"
                    @click="showPromo"
                    v-if="$root.user"
                >
                    Промокод
                </div>
                <div
                    :class="['item', {'isActive': page == 'faq'}]"
                    @click="$root.$emit('open', 'faq')"
                    @click="$root.$emit('toggleMenu')"
                >
                    FAQ
                </div>
                <div
                    class="item"
                    v-if="$root.user"
                    @click="logout"
                >
                    Выход
                </div>
                <div class="online-spawn flex"><div class="circle-online"></div><span class="ml-1">{{ $root.online }}</span></div>
            </div>
            <div class="klada flex ml-auto">
                <div class="dadar flex" style="min-width: 200px">
                    <div class="oprew">
                        <div class="list">
                            <img @click="$root.$emit('open', 'main')" style="background: #5983b4;
    padding: 5px;
    border-radius: 9px;" src="/assets/image/logo_white.png?v=6" width="30px"/>
                            <div class="ml-2" @click="$root.$emit('open', 'main')">Lucker</div>
                            <div class="online-spawn flex" style="padding-left: 10px;">
                                <div class="circle-online"></div>
                                <span class="ml-1">{{ $root.online }}</span>
                            </div>
                        </div>
                        <Profile v-if="$root.user"/>
                    </div>
                </div>
                <div class="header-buttons" v-if="$root.user">
                    <button class="blue mr-2 dep-top-btn" @click="$root.$emit('open', 'payment')">
                        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff" style="position: relative;right: 23px;top:2px">

                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                            <g id="SVGRepo_iconCarrier"> <path d="M20 15C20.5523 15 21 14.5523 21 14C21 13.4477 20.5523 13 20 13C19.4477 13 19 13.4477 19 14C19 14.5523 19.4477 15 20 15Z" fill="#ffffff"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M16.775 0.985398C18.4919 0.460783 20.2821 1.55148 20.6033 3.3178L20.9362 5.14896C22.1346 5.54225 23 6.67006 23 8V10.7639C23.6137 11.3132 24 12.1115 24 13V15C24 15.8885 23.6137 16.6868 23 17.2361V20C23 21.6569 21.6569 23 20 23H4C2.34315 23 1 21.6569 1 20V8C1 6.51309 2.08174 5.27884 3.50118 5.04128L16.775 0.985398ZM21 16C21.5523 16 22 15.5523 22 15V13C22 12.4477 21.5523 12 21 12H18C17.4477 12 17 12.4477 17 13V15C17 15.5523 17.4477 16 18 16H21ZM21 18V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V8C3 7.44772 3.44772 7 4 7H20C20.55 7 20.9962 7.44396 21 7.99303L21 10H18C16.3431 10 15 11.3431 15 13V15C15 16.6569 16.3431 18 18 18H21ZM18.6954 3.60705L18.9412 5H10L17.4232 2.82301C17.9965 2.65104 18.5914 3.01769 18.6954 3.60705Z" fill="#ffffff"></path> </g>

                        </svg>
                        Кошелек
                    </button>
                    <!--<button class="ser with-top-btn" @click="$root.$emit('open', 'withdraw')">Вывести</button>-->
                </div>
            </div>
            <div class="header-buttons ml-auto" v-if="$root.user == null">
                <button class="blue vkbutn" style="padding: 12px 40px;font-size: 20px;" @click="auth">
                    <img src="/assets/image/vk_white.svg" width="25" />
                    <span class="ml-2">Авторизация</span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Profile from "./Profile"
import Promocode from "./modals/Promocode";

export default {
    props: ['page'],
    components: {
        Profile,
        Promocode
    },
    data() {
        return {
            showMenu: false
        }
    },
    mounted() {
        this.$root.$on('toggleMenu', () => this.showMenu = !this.showMenu)
    },
    methods: {
        showPromo() {
            this.$bvModal.show('promocode');
        },
        auth() {
            location.href = `/auth/vkontakte`
        },
        logout() {
            location.href = `/user/logout`
        }
    }
}
</script>

<style scoped>

</style>
