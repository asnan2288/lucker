<template>
    <div class="slots__banners mb-3">
        <a href="javascript:;" @click="$root.$emit('open', 'payment')" class="slots__banners-item" style="background-image: linear-gradient(to bottom, #3a7af5, #5e99fd);">
            <div class="slots__banners-item-left">
            <img src="https://luc1.fun/assets/image/bonus_hd.png" style="z-index: 5;position: absolute;width: 140px;bottom: 20px;left: -16px;">
            <div class="slots__banners-item-left-text slots__hm" style="margin-left: 131px;">
                Бонус +50%
                <br>
                к депозиту!
                <br>
                <span style="font-weight: 400;font-size: 16px;">
                    по промокоду DEP50
                </span>
        </div>
            </div>
            <div class="slots__banners-item-right">
                <button class="blue playgame-btn" @click="$root.$emit('open', 'payment')" style="text-decoration: none !important;position: relative;bottom: 5px;left: 20px;">
                    <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;right: 10px;bottom: 3px;">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                        <g id="SVGRepo_iconCarrier"> <path d="M3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 12.8302 22 11.8419 21.965 11M20.8284 7.17157C19.6569 6 17.7712 6 14 6H10C6.22876 6 4.34315 6 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 15.1698 2 16.1581 2.03496 17" stroke="#3D84E0" stroke-width="1.5" stroke-linecap="round"></path> <path d="M12 2C13.8856 2 14.8284 2 15.4142 2.58579C16 3.17157 16 4.11438 16 6M8.58579 2.58579C8 3.17157 8 4.11438 8 6" stroke="#3D84E0" stroke-width="1.5" stroke-linecap="round"></path> <path d="M12 17.3333C13.1046 17.3333 14 16.5871 14 15.6667C14 14.7462 13.1046 14 12 14C10.8954 14 10 13.2538 10 12.3333C10 11.4129 10.8954 10.6667 12 10.6667M12 17.3333C10.8954 17.3333 10 16.5871 10 15.6667M12 17.3333V18M12 10V10.6667M12 10.6667C13.1046 10.6667 14 11.4129 14 12.3333" stroke="#3D84E0" stroke-width="1.5" stroke-linecap="round"></path> </g>

                    </svg>
                    Перейти
                </button>
            </div>
        </a>
        <a href="https://lucker_tg.t.me/" class="slots__banners-item" style="background-image: linear-gradient(to bottom, #3a7af5, #5e99fd);">
            <div class="slots__banners-item-left">
                <img src="https://luc1.fun/assets/image/tgbanner_hd.png" style="z-index: 5;position: absolute;width: 140px;bottom: 20px;left: -16px;">
                <div class="slots__banners-item-left-text slots__hm" style="margin-left: 131px;">
                    Промокоды у нас
                    <br>
                    в Telegram!
                    <br>
                    <span style="font-weight: 400;font-size: 16px;">
                    Ежедневные бонусы
                </span>
                </div>
            </div>
            <div class="slots__banners-item-right">
                <a type="button" href="https://lucker_tg.t.me/" class="blue playgame-btn" style="text-decoration: none !important;position: relative;bottom: 5px;left: 20px;">
                    <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;right: 10px;bottom: 3px;">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                        <g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M23.1117 4.49449C23.4296 2.94472 21.9074 1.65683 20.4317 2.227L2.3425 9.21601C0.694517 9.85273 0.621087 12.1572 2.22518 12.8975L6.1645 14.7157L8.03849 21.2746C8.13583 21.6153 8.40618 21.8791 8.74917 21.968C9.09216 22.0568 9.45658 21.9576 9.70712 21.707L12.5938 18.8203L16.6375 21.8531C17.8113 22.7334 19.5019 22.0922 19.7967 20.6549L23.1117 4.49449ZM3.0633 11.0816L21.1525 4.0926L17.8375 20.2531L13.1 16.6999C12.7019 16.4013 12.1448 16.4409 11.7929 16.7928L10.5565 18.0292L10.928 15.9861L18.2071 8.70703C18.5614 8.35278 18.5988 7.79106 18.2947 7.39293C17.9906 6.99479 17.4389 6.88312 17.0039 7.13168L6.95124 12.876L3.0633 11.0816ZM8.17695 14.4791L8.78333 16.6015L9.01614 15.321C9.05253 15.1209 9.14908 14.9366 9.29291 14.7928L11.5128 12.573L8.17695 14.4791Z" fill="#3D84E0"/> </g>

                    </svg>
                    Перейти
                </a>
            </div>
        </a>
    </div>
</template>

<style scoped>
.slots__banners {
    display: grid;
    gap: 18px;
    grid-template-columns: repeat(2,minmax(0,1fr))
}

@media screen and (max-width: 770px) {
    .slots__banners {
        grid-template-columns:repeat(1,minmax(0,1fr))
    }
}

@media (max-width: 1000px) {
    .slots__banners {
        gap:10px
    }
}

.slots__banners-item {
    aspect-ratio: 660/200;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    z-index: 1
}

@media screen and (max-width: 980px) {
    .slots__banners-item {
        border-radius:4px
    }
}

.slots__banners-item-overlay {
    background: linear-gradient(90deg,#000,transparent);
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 50%
}

.slots__banners-item-img-big {
    height: 100%;
    width: 100%
}

.slots__banners-item-img-right {
    float: right;
    height: 100%;
    margin-left: auto;
    margin-right: 4px
}

.slots__banners-item-img-bg {
    height: 100%;
    left: 0;
    position: absolute;
    top: 0;
    width: 100%;
    z-index: -1
}

.slots__banners-item-btn {
    align-items: center;
    background: #fff;
    border-radius: 4px;
    color: #574d81;
    display: flex;
    font-size: 12px;
    font-weight: 700;
    height: 37px;
    justify-content: center;
    line-height: 14px;
    text-align: center;
    transition: all .2s linear;
    width: 140px
}

@media screen and (max-width: 480px) {
    .slots__banners-item-btn {
        margin:auto auto 2%
    }
}

.slots__banners-item-btn:active,.slots__banners-item-btn:hover {
    background: #f3f3f3
}

.slots__banners-item-left {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    left: 4.55%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%
}

.slots__banners-item-right {
    align-items: flex-start;
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    left: 58.55%;
    position: absolute;
    top: 53%;
    transform: translateY(-50%);
    width: 100%;
}
.slots__banners-item-right-text {
    color: #fff;
    font-size: 42px;
    font-weight: 700;
    line-height: 21px;
    margin-bottom: 10px;
    white-space: nowrap;
}

@media screen and (max-width: 480px) {
    .slots__banners-item-left {
        justify-content:center;
        left: 0
    }
}

.slots__banners-item-left-text {
    color: #fff;
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
    margin-bottom: 10px;
    white-space: nowrap
}

@media screen and (max-width: 480px) {
    .slots__hm {
        display:none
    }
    .slots__banners {
        display: none;
    }
}

</style>
