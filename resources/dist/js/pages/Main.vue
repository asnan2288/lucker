    <template>
        <div class="content cards col-12 ml-auto mr-auto p-0">
            <SlotsBanner />
            <h2 style="color: #2c4a71;" id="our_games" class="Header-text">
                <svg width="36px" height="36px" style="position:relative;bottom:5px;" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="#5997fe" stroke="#5997fe" stroke-width="0.00048000000000000007">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                    <g id="SVGRepo_iconCarrier"> <title>apps-large-solid</title> <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> <rect width="48" height="48" fill="none"/> </g> <g id="Q3_icons" data-name="Q3 icons"> <g> <path d="M20,4H6A2,2,0,0,0,4,6V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V6A2,2,0,0,0,20,4Z"/> <path d="M42,4H28a2,2,0,0,0-2,2V20a2,2,0,0,0,2,2H42a2,2,0,0,0,2-2V6A2,2,0,0,0,42,4Z"/> <path d="M20,26H6a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V28A2,2,0,0,0,20,26Z"/> <path d="M42,26H28a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H42a2,2,0,0,0,2-2V28A2,2,0,0,0,42,26Z"/> </g> </g> </g> </g>

                </svg>
                Наши режимы
            </h2>
            <div class="new-games v2">
                <div class="games-grid">
                    <div class="card-game-wrapper">
                        <a href="javascript:;" class="card-game-new dice" style="text-decoration: none!important">
                            <img src="/assets/image/games/dice.png?v=10" class="card-game-new__image bb" alt="BonusBuy" />
                            <div class="card-game-new__name" style="position: relative;bottom: 46px;right: 56px;margin-bottom: 0;">Dice</div>
                            <button @click="$root.$emit('open', 'dice')" class="blue playgame-btn" style="text-decoration:none!important;position: relative;bottom: 43px;">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;top: 3px;right: 15px;">

                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                                <g id="SVGRepo_iconCarrier"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#405679" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#405679" stroke-width="1.5" stroke-linecap="round"></path> </g>

                            </svg>
                                Играть
                            </button>
                        </a>
                    </div>
                    <div class="card-game-wrapper">
                        <a href="javascript:;" class="card-game-new mines" style="text-decoration: none!important">
                            <img src="/assets/image/games/mines.png?v=10" class="card-game-new__image lg" alt="BonusBuy" />
                            <div class="card-game-new__name" style="position: relative;bottom: 21px;right: 51px;margin-bottom: 0;">Mines</div>
                            <button @click="$root.$emit('open', 'mines')" class="blue playgame-btn" style="text-decoration:none!important;position: relative;bottom: 16px;">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;top: 3px;right: 15px;">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                                    <g id="SVGRepo_iconCarrier"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#405679" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#405679" stroke-width="1.5" stroke-linecap="round"></path> </g>

                                </svg>
                                Играть
                            </button>
                        </a>
                    </div>
                    <div class="card-game-wrapper">
                        <a href="javascript:;" class="card-game-new bubbles" style="text-decoration: none!important">
                            <img src="/assets/image/games/bubbles.png?v=10" class="card-game-new__image ss" alt="BonusBuy" style="bottom: 22px;position: relative;" />
                            <div class="card-game-new__name" style="position: relative;bottom: 33px;right: 38px;margin-bottom: 0;">Bubbles</div>
                            <button @click="$root.$emit('open', 'bubbles')" class="blue playgame-btn" style="text-decoration:none!important;position: relative;bottom: 29px;">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;top: 3px;right: 15px;">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                                    <g id="SVGRepo_iconCarrier"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#405679" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#405679" stroke-width="1.5" stroke-linecap="round"></path> </g>

                                </svg>
                                Играть
                            </button>
                        </a>
                    </div>
                    <div class="card-game-wrapper">
                        <a href="javascript:;" class="card-game-new wheel" style="text-decoration: none!important">
                            <img src="/assets/image/games/wheel.png?v=10" class="card-game-new__image bd" alt="BonusBuy" style="position:relative;top:5px;" />
                            <div class="card-game-new__name" style="position: relative;bottom: 21px;right: 48px;margin-bottom: 0;">Wheel</div>
                            <button @click="$root.$emit('open', 'wheel')" class="blue playgame-btn" style="text-decoration:none!important;position: relative;bottom: 16px;">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;top: 3px;right: 15px;">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                                    <g id="SVGRepo_iconCarrier"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#405679" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#405679" stroke-width="1.5" stroke-linecap="round"></path> </g>

                                </svg>
                                Играть
                            </button>
                        </a>
                    </div>
                    <div class="card-game-wrapper">
                        <!--<span class="new__badge
                         badgeX bg-danger">NEW</span>-->
                        <a href="javascript:;" class="card-game-new allingame" style="text-decoration: none!important">
                            <img src="/assets/image/games/allin.png?v=10" class="card-game-new__image bd" alt="BonusBuy" />
                            <div class="card-game-new__name" style="position: relative;bottom: 21px;right: 48px;margin-bottom: 0;">ALL IN</div>
                            <button @click="$root.$emit('open', 'allin')" class="blue playgame-btn" style="text-decoration:none!important;position: relative;bottom: 16px;">
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: relative;top: 3px;right: 15px;">

                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                                    <g id="SVGRepo_iconCarrier"> <path d="M13.8876 9.9348C14.9625 10.8117 15.5 11.2501 15.5 12C15.5 12.7499 14.9625 13.1883 13.8876 14.0652C13.5909 14.3073 13.2966 14.5352 13.0261 14.7251C12.7888 14.8917 12.5201 15.064 12.2419 15.2332C11.1695 15.8853 10.6333 16.2114 10.1524 15.8504C9.6715 15.4894 9.62779 14.7336 9.54038 13.2222C9.51566 12.7947 9.5 12.3757 9.5 12C9.5 11.6243 9.51566 11.2053 9.54038 10.7778C9.62779 9.26636 9.6715 8.51061 10.1524 8.1496C10.6333 7.78859 11.1695 8.11466 12.2419 8.76679C12.5201 8.93597 12.7888 9.10831 13.0261 9.27492C13.2966 9.46483 13.5909 9.69274 13.8876 9.9348Z" stroke="#405679" stroke-width="1.5"></path> <path d="M7 3.33782C8.47087 2.48697 10.1786 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 10.1786 2.48697 8.47087 3.33782 7" stroke="#405679" stroke-width="1.5" stroke-linecap="round"></path> </g>

                                </svg>
                                Играть
                            </button>
                        </a>
                    </div>
                    <!--<div class="card-game-wrapper">
                        <a href="javascript:;" class="card-game-new" @click="$root.$emit('open', 'slots')">
                            <img src="/assets/image/games/slots.png?v=2" class="card-game-new__image bd" width="111" alt="BonusBuy" />
                            <div class="card-game-new__name">Slots</div>
                        </a>
                    </div>-->
                </div>
            </div>
        </div>
    </template>

    <script>
    import SlotsBanner from './Banner.vue'

    export default {
        components: {
            SlotsBanner
        }
    }
    </script>

    <style scoped>
    .games-grid {
        display: grid;
        gap: 16px;
        grid-template-columns: repeat(4,minmax(0,1fr))
    }

    @media screen and (max-width: 1630px) {
        .games-grid {
            grid-template-columns:repeat(4,minmax(0,1fr))
        }
    }

    @media screen and (max-width: 1330px) {
        .games-grid {
            grid-template-columns:repeat(3,minmax(0,1fr))
        }
    }

    @media screen and (max-width: 1130px) {
        .games-grid {
            grid-template-columns:repeat(3,minmax(0,1fr))
        }
    }

    @media screen and (max-width: 980px) {
        .games-grid {
            gap:10px;
            grid-template-columns: repeat(2,minmax(0,1fr))
        }
    }

    .card-game-new {
        align-items: center;
        aspect-ratio: 1/1;
        display: flex;
        flex-direction: column;
        max-width: 100%;
        overflow: hidden;
        position: relative
    }

    .card-game-new.dice {
        background: linear-gradient(0deg,#3871e4,#6AA1FE);
    }

    .card-game-new.allingame {
        background: linear-gradient(0deg,#6055e2,#929dfb);
    }

    .card-game-new.mines {
        background: linear-gradient(0deg,#E59F2F,#FFB94A);
    }

    .card-game-new.wheel {
        background: linear-gradient(0deg,#127D7D,#B2C082);
    }

    .card-game-new.bubbles {
        background: linear-gradient(0deg,#B75925,#E3B071);
    }



    .card-game-new__image {
        height: auto;
        margin: auto;
        max-width: 135px;
        width: 100%
    }

    .card-game-new__image.bb {
        max-width: 180px;
        transform: translateY(10px)
    }

    .card-game-new__image.lg {
        max-width: 204px;
        transform: translateY(15px)
    }

    .card-game-new__image.bd {
        max-width: 138px;
        /* transform: translate(12px) translateY(10px) */
    }

    .card-game-new__image.ss {
        max-width: 131px;
        transform: translateY(20px)
    }

    .card-game-new__image.cd {
        max-width: 136px;
        transform: translateY(14px)
    }

    .card-game-new__image.bs {
        max-width: 116px;
        transform: translateY(13px)
    }

    .card-game-new__image.ct {
        max-width: 161px;
        transform: translateY(10px)
    }

    .card-game-new__image.mw {
        max-width: 103px;
        transform: translateY(10px)
    }

    .card-game-new__image.pi {
        max-width: 103px;
        transform: translateY(14px)
    }

    .card-game-new__image.hl {
        max-width: 113px;
        transform: translateY(12px)
    }

    .card-game-new__image.ms {
        max-width: 130px;
        transform: translateY(8px)
    }

    .card-game-new__image.x100 {
        max-width: 109px;
        transform: translateY(8px)
    }

    @media screen and (max-width: 980px) {
        .card-game-new__image {
            max-height:55%;
            max-width: 100%!important;
            width: auto
        }
    }

    .card-game-new__name {
        color: #fff;
        font-size: 22px;
        font-weight: 700;
        line-height: 27px;
        margin-bottom: 24px;
        text-align: center
    }

    @media screen and (max-width: 550px) {
        .card-game-new__name {
            font-size:18px;
            margin-bottom: 5px;
            bottom: 14px!important;
            right: 47px!important;
        }
        .card-game-new.mines .playgame-btn {
            bottom: 14px!important;
        }
    }

    .new-games.v2 {
        margin-bottom: 18px!important;
        margin-top: 10px!important
    }

    @media screen and (max-width: 980px) {
        .new-games.v2 {
            margin-bottom:10px!important;
            margin-top: 10px!important
        }
    }

    .new-games.v2 .flex {
        gap: 18px!important
    }

    @media screen and (max-width: 980px) {
        .new-games.v2 .flex {
            gap:10px!important
        }
    }

    .new-games.v2 .flex .game {
        align-items: center;
        display: flex;
        padding: 25px!important
    }

    .new-games.v2 .flex .game img {
        margin-right: 22px!important
    }

    .new-games.v2 .flex .game .name {
        margin: 0!important
    }

    @media screen and (max-width: 980px) {
        .new-games.v2 .flex .game {
            padding:13px!important
        }
    }

    .new-games.v2.v1 .game {
        align-items: center;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 15px 85px #d7d3ec73;
        display: flex;
        padding: 25px 30px;
        position: relative;
        text-align: center;
        width: 100%;
        z-index: 1
    }

    .content {
        background: none!important
    }
    </style>
