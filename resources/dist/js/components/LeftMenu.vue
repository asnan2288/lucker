<template>
    <div class="left-main cards">
        <div class="logoBox mt-3" @click="$root.$emit('open', 'main')">
            <img style="background: #5983b4;
    padding: 5px;
    border-radius: 15px;" src="/assets/image/logo_white.png?v=6" width="40px"/>
            <div>Lucker</div>
        </div>
        <div class="games-menu mt-3">
            <!--<div
                class="games-item menu-slots"
                :class="[page == 'slots' ? 'isActive blue' : '']"
                @click="$root.$emit('open', 'slots')"
            >
                <div class="games-img slots"></div>
                <div class="games-title">Slots</div>
            </div>-->
            <div
                class="games-item menu-dice"
                :class="[page == 'dice' ? 'isActive blue' : '']"
                @click="$root.$emit('open', 'dice')"
            >
                <div class="games-img dice"></div>
                <div class="games-title">Dice</div>
            </div>
            <div
                class="games-item menu-mines"
                :class="[page == 'mines' ? 'isActive blue' : '']"
                @click="$root.$emit('open', 'mines')"
            >
                <div class="games-img mines"></div>
                <div class="games-title">Mines</div>
            </div>
            <div
                class="games-item menu-bubbles"
                :class="[page == 'bubbles' ? 'isActive blue' : '']"
                @click="$root.$emit('open', 'bubbles')"
            >
                <div class="games-img bubbles"></div>
                <div class="games-title">Bubbles</div>
            </div>
            <div
                class="games-item menu-wheel"
                :class="[page == 'wheel' ? 'isActive blue' : '']"
                @click="$root.$emit('open', 'wheel')"
            >
                <div class="games-img wheel" style="zoom: 0.9;margin-bottom: 2px;width: 32px;"></div>
                <div class="games-title">Wheel</div>
            </div>
            <div
                class="games-item menu-allin"
                :class="[page == 'allin' ? 'isActive blue' : '']"
                @click="$root.$emit('open', 'allin')"
            >
                <div class="games-img allingame"></div>
                <div class="games-title">ALL IN</div>
            </div>
            <div class="games-item still" @click="$root.$emit('toggleMenu')" style="display: none;">
                <svg viewBox="0 0 257 44">
                    <circle cx="128.67" cy="21.993" r="21.333"></circle>
                    <circle cx="21.67" cy="21.993" r="21.333"></circle>
                    <circle cx="235.337" cy="21.993" r="21.333"></circle>
                </svg>
                <div class="games-title">Еще</div>
            </div>
        </div>
        <div class="contact-info mb-3">
            <div style="display: flex;justify-content: center;">
                <a :href="$root.config.tg_channel" target="_blank" class="contact-box mb-3"><img src="/assets/image/tg.svg" width="25px" /></a>
                <a :href="$root.config.vk_url" target="_blank" style="margin-left: 10px;" class="contact-box mb-3"><img src="/assets/image/vk.svg" width="25px" /></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['page'],
}
</script>

<style scoped>
</style>
