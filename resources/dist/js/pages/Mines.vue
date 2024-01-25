<template>
    <div>
        <!--<Ellipsis v-if="isLoading && !$root.isLoading" />-->
        <!--В случае чего дописать к .content свойство v-else-->
        <div class="content">
            <div class="col-12" style="margin-bottom: 10px;display:flex;background-color: transparent!important;padding-left: 0;">
                <button class="blue mr-2 back-arrow-btn" @click="$root.$emit('open', 'main')">
                    <svg width="24px" height="24px" style="position:relative;right:23px;top:2px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                        <g id="SVGRepo_iconCarrier"> <path d="M4 12L10 6M4 12L10 18M4 12H14.5M20 12H17.5" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g>

                    </svg>
                    Главная
                </button>
                <button @click="toggleSounds" class="blue mr-2 back-arrow-btn soundsControl" style="padding: 10px 12px;background-color: #fff;">
                    <svg v-if="isSounds === 0" width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

                    <g id="SVGRepo_iconCarrier"> <path d="M15.5001 11.9998C15.5001 12.5317 15.4647 13.4879 15.4128 14.6052C15.2726 17.6226 15.2025 19.1313 14.2798 19.7797C14.1029 19.9041 13.9048 20.0049 13.7001 20.0747C12.7327 20.4048 11.5976 19.747 9.50009 18.3725M7.01629 17.0417C6.76828 16.9998 6.51225 16.9998 6.00018 16.9998C4.62626 16.9998 3.9393 16.9998 3.33997 16.7225C2.79239 16.4692 2.24482 15.9539 1.95863 15.4228C1.6454 14.8414 1.60856 14.237 1.53488 13.0282C1.52396 12.849 1.51525 12.6722 1.50928 12.4998M1.95863 8.57679C2.24482 8.04563 2.79239 7.53042 3.33997 7.27707C3.9393 6.99979 4.62626 6.99979 6.00018 6.99979C6.51225 6.99979 6.76828 6.99979 7.01629 6.95791C7.26147 6.9165 7.50056 6.84478 7.72804 6.74438C7.95815 6.64283 8.1719 6.50189 8.59941 6.22002L8.81835 6.07566C11.3613 4.39898 12.6328 3.56063 13.7001 3.92487C13.9048 3.9947 14.1029 4.09551 14.2798 4.21984C15.1151 4.80685 15.2517 6.09882 15.3741 8.57679" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M20 18C20 18 21.5 16.2 21.5 12C21.5 9.56658 20.9965 7.93882 20.5729 7" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18 15C18 15 18.5 14.1 18.5 12C18.5 11.1381 18.4158 10.4784 18.3165 10" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> <path d="M22 2L2 22" stroke="#000" stroke-width="1.5" stroke-linecap="round"></path> </g>

                    </svg>
                    <svg v-if="isSounds === 1" width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"/>

                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                        <g id="SVGRepo_iconCarrier"> <path d="M20 6C20 6 21.5 7.8 21.5 12C21.5 16.2 20 18 20 18" stroke="#000" stroke-width="1.5" stroke-linecap="round"/> <path d="M18 9C18 9 18.5 9.9 18.5 12C18.5 14.1 18 15 18 15" stroke="#000" stroke-width="1.5" stroke-linecap="round"/> <path d="M1.95863 8.57679C2.24482 8.04563 2.79239 7.53042 3.33997 7.27707C3.9393 6.99979 4.62626 6.99979 6.00018 6.99979C6.51225 6.99979 6.76828 6.99979 7.01629 6.95791C7.26147 6.9165 7.50056 6.84478 7.72804 6.74438C7.95815 6.64283 8.1719 6.50189 8.59941 6.22002L8.81835 6.07566C11.3613 4.39898 12.6328 3.56063 13.7001 3.92487C13.9048 3.9947 14.1029 4.09551 14.2798 4.21984C15.2025 4.86829 15.2726 6.37699 15.4128 9.3944C15.4647 10.5117 15.5001 11.4679 15.5001 11.9998C15.5001 12.5317 15.4647 13.4879 15.4128 14.6052C15.2726 17.6226 15.2025 19.1313 14.2798 19.7797C14.1029 19.9041 13.9048 20.0049 13.7001 20.0747C12.6328 20.4389 11.3613 19.6006 8.81834 17.9239L8.59941 17.7796C8.1719 17.4977 7.95815 17.3567 7.72804 17.2552C7.50056 17.1548 7.26147 17.0831 7.01629 17.0417C6.76828 16.9998 6.51225 16.9998 6.00018 16.9998C4.62626 16.9998 3.9393 16.9998 3.33997 16.7225C2.79239 16.4692 2.24482 15.9539 1.95863 15.4228C1.6454 14.8414 1.60856 14.237 1.53488 13.0282C1.52396 12.849 1.51525 12.6722 1.50928 12.4998" stroke="#000" stroke-width="1.5" stroke-linecap="round"/> </g>

                    </svg>
                </button>
                <input type="range" v-model="volume" min="0" max="100" step="1" @input="changeVolume" />
            </div>
            <div class="cards col-12 ml-auto mr-auto p-0">
                <div class="mines">
                    <div class="content-body col-12">
                        <div class="container rows">
                            <div class="one col-4">
                                <div class="controlPanel">
                                    <label>Количество бомб</label>
                                    <div class="buttons bombs rows">
                                        <button :disabled="game.state == 2" :class="['amount-number', { 'active': bomb == 3 }]" @click="bomb = 3">
                                            3
                                        </button>
                                        <button :disabled="game.state == 2" :class="['amount-number', { 'active': bomb == 5 }]" @click="bomb = 5">
                                            5
                                        </button>
                                        <button :disabled="game.state == 2" :class="['amount-number', { 'active': bomb == 10 }]" @click="bomb = 10">
                                            10
                                        </button>
                                        <button :disabled="game.state == 2" :class="['amount-number', { 'active': bomb == 24 }]" @click="bomb = 24">
                                            24
                                        </button>
                                        <button :disabled="game.state == 2" class="amount-number" style="position: relative;" @click="changeBomb = true">
                                            Изменить
                                            <div :class="['redBox', { 'show': changeBomb }]">
                                                <input type="number" class="redinp" v-model="bomb" @change="changeBomb = false" />
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="controlPanel mt-4 mb-3 mines-bets">
                                    <label>Сумма игры</label>
                                    <div class="mines-amount">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <button :disabled="game.state == 2" class="input-group-text amount-number amounts" @click="typeBet('min')">Min</button>
                                                <button :disabled="game.state == 2" class="input-group-text amount-number amounts" @click="typeBet('/2')">x/2</button>
                                            </div>
                                            <input
                                                type="number"
                                                class="form-control form"
                                                v-model="bet"
                                                @change="typeBet('default')"
                                                :disabled="game.state == 2"
                                            />
                                            <div class="input-group-append">
                                                <button :disabled="game.state == 2" class="input-group-text amount-number amounts" @click="typeBet('x2')">x2</button>
                                                <button :disabled="game.state == 2" class="input-group-text amount-number amounts" @click="typeBet('max')">Max</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="btn-play blue mt-3 col-12"
                                    @click="play"
                                    v-if="game.state != 2"
                                >
                                    Начать игру
                                </button>
                                <button
                                    class="btn-play blue mt-3 col-12 mt-2 flex"
                                    @click="take"
                                    v-if="game.state == 2"
                                >
                                    Забрать
                                    <ICountUp
                                        class="ml-1 font-weight-500"
                                        :endVal="game.total"
                                        :options="options"
                                    />
                                </button>
                                <button class="btn-play ser mt-2" v-if="game.state == 2" @click="autoSelect">Автовыбор</button>
                            </div>
                            <div class="two col-6 flex spaceEvenly">
                                <div class="minefields">
                                    <div class="winBox" v-if="game.state == 1">
                                        <div class="winT">
                                            <div class="col-12 winsum">{{ parseFloat(game.total).toFixed(2) }}</div>
                                            <div class="col-12 wincoff">{{ parseFloat(game.coeff).toFixed(2) }}x</div>
                                        </div>
                                    </div>

                                    <div
                                        v-for="(item, key) in grid"
                                        :key="key"
                                        @click="openPath(key + 1)"
                                        :class="[
                                        'cell',
                                        { 'lose': item.bomb },
                                        { 'win': item.diamond },
                                        { 'opacity': click.indexOf(item.index + 1) === -1},
                                        { 'wait': loaderCell == key + 1}
                                    ]"
                                    />
                                </div>
                            </div>
                            <div class="three col-2">
                                <div class="stepsPrev" @click="$refs.slick.prev()">
                                    <img
                                        src="data:image/svg+xml;charset=utf-8,%3Csvg width='16' height='16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M13.066 11.536a.5.5 0 00.708 0l.473-.473a.5.5 0 000-.707L8.354 4.464a.5.5 0 00-.708 0l-5.892 5.892a.5.5 0 000 .707l.472.473a.5.5 0 00.708 0l4.712-4.712a.5.5 0 01.708 0l4.713 4.712z' fill='%23777792'/%3E%3C/svg%3E"
                                        width="20px"
                                    />
                                </div>
                                <Slick ref="slick" :options="splideOptions" class="stepsCoffBox" v-if="showSlick">
                                    <div
                                        v-for="(item, key) in (25 - bomb)"
                                        :key="key"
                                        :class="[
                                            'swiper-slide',
                                            'stepsCoffs',
                                            {'win': click.length >= key + 1},
                                            {'active': click.length == key && game.state == 2},
                                            {'lose': game.state == 3 && click.length == key + 1}
                                        ]"
                                        style="width: 100%; display: inline-block;"
                                    >
                                        <div class="rows justify-content-between">
                                            <div class="step-number">{{ key + 1 }} ход</div>
                                            <div class="step-coff">
                                                {{ getPrefix( getCoff(key + 1, bomb) ) }}x
                                            </div>
                                        </div>
                                        <h6 class="winSum">
                                            {{ parseFloat(getCoff(key + 1, bomb) * bet).toFixed(2) }}
                                        </h6>
                                    </div>
                                </Slick>
                                <div class="stepsPrev" @click="$refs.slick.next()">
                                    <img
                                        src="data:image/svg+xml;charset=utf-8,%3Csvg width='16' height='16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M13.066 11.536a.5.5 0 00.708 0l.473-.473a.5.5 0 000-.707L8.354 4.464a.5.5 0 00-.708 0l-5.892 5.892a.5.5 0 000 .707l.472.473a.5.5 0 00.708 0l4.712-4.712a.5.5 0 01.708 0l4.713 4.712z' fill='%23777792'/%3E%3C/svg%3E"
                                        width="20px"
                                        style="transform: rotate(180deg);margin-top: 15px;"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';
import { getEmptyArr } from '../utils/getEmptyArr'
import Ellipsis from '../components/ui/loader/Ellipsis'
import ICountUp from 'vue-countup-v2';

export default {
    components: {
        Slick,
        Ellipsis,
        ICountUp
    },
    data() {
        return {
            bomb: 3,
            bet: "1.00",
            changeBomb: false,
            grid: [],
            click: [],
            isSounds: 1,
            volume: 100,
            audiosuc: new Audio('https://luc1.fun/suc_mines.mp3'),
            audiofail: new Audio('https://luc1.fun/fail_mines.mp3'),
            audioinstant: new Audio('https://luc1.fun/instantsuc_mines.mp3'),
            audiostart: new Audio('https://luc1.fun/startgame.mp3'),
            audios: [],
            showSlick: true,
            isLoading: true,
            loaderCell: null,
            noty: {
                mess: null,
                type: null
            },
            game: {
                state: 0, // 0 - inactive, 1 - win, 2 - process, 3 - lose
                total: 0,
                coeff: 0,
                step: 0
            },
            splideOptions: {
                slidesToShow: 5,
                vertical: true,
                slidesToScroll: 5,
                arrows: false,
                infinite: false,
                responsive: [{
                    breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                            vertical: false
                        }
                    }]
            },
            options: {
                useEasing: true,
                useGrouping: true,
                separator: " ",
                decimal: ".",
                prefix: "",
                suffix: "",
                decimalPlaces: 2
            }
        }
    },
    created() {
        this.audios = [this.audiosuc, this.audiofail, this.audioinstant, this.audiostart];
    },
    mounted() {
        this.grid = getEmptyArr(25, { bomb: false, diamond: false })
        this.init()
    },
    methods: {
        toggleSounds() {
            this.isSounds = this.isSounds === 1 ? 0 : 1;
            if(this.isSounds === 0) {
                this.volume = 0;
            } else {
                this.volume = 100;
                this.changeVolume()
            }
        },
        changeVolume() {
            // изменение громкости для всех звуков
            this.audios.forEach(audio => {
                audio.volume = this.volume / 100;
            });
            if(this.volume > 0) {
                this.isSounds = 1;
            }
        },
        init() {
            this.$root.axios.post('/mines/init')
            .then(response => {
                const {data} = response

                this.isLoading = false

                if(typeof data.click !== 'undefined') {
                    this.bet = data.amount
                    this.bomb = data.bombs
                    this.game = {
                        ...this.game,
                        state: 2,
                        total: data.total
                    }
                    this.click = data.click
                    this.grid = this.grid.map(item =>
                        data.click.indexOf(item.index + 1) !== -1
                            ? { ...item, diamond: true }
                            : item
                    )
                }
            })
        },
        play() {
            if(!this.$root.user) {
                return this.$root.$emit('noty', {
                    title: 'Ошибка',
                    text: 'Вы не авторизованы',
                    type: 'error'
                })
            }

            this.$root.axios.post('/mines/start', {
                amount: this.bet,
                bombs: this.bomb
            })
            .then(response => {
                const {data} = response

                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        text: data.message,
                        type: 'error'
                    })
                }

                if(this.isSounds === 1) {
                    if (!this.audiostart.paused) {
                        this.audiostart.pause();
                        this.audiostart.currentTime = 0;
                    }
                    this.audiostart.play();
                }

                this.$refs.slick.goTo(0, 1e3),
                this.click = []
                this.grid = getEmptyArr(25, { bomb: false, diamond: false })
                this.game = {
                    ...this.game,
                    total: 0,
                    state: 2
                }
                this.$root.user.balance = data.balance
            })
        },
        openPath(index) {
            if(this.click.indexOf(index) !== -1) return;
            if(this.game.state != 2) return;

            this.loaderCell = index
            this.$root.axios.post('/mines/open', {
                path: index
            })
            .then(response => {
                const {data} = response
                this.loaderCell = -1

                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        text: data.message,
                        type: 'error'
                    })
                }

                this.click.push(index)
                if(data.continue) {
                    this.grid = this.grid.map(item =>
                        item.index == index - 1
                            ? {...item, diamond: true}
                            : item
                    )

                    this.game = {
                        ...this.game,
                        state: 2,
                        total: data.total
                    }

                    if(this.isSounds === 1) {
                        if (!this.audiosuc.paused) {
                            this.audiosuc.pause();
                            this.audiosuc.currentTime = 0;
                        }
                        this.audiosuc.play();
                    }

                    this.$refs.slick.goTo(this.click.length, 1e3)
                } else {
                    this.game = {
                        ...this.game,
                        state: 3,
                        total: 0
                    }

                    if(this.isSounds === 1) {
                        if (!this.audiofail.paused) {
                            this.audiofail.pause();
                            this.audiofail.currentTime = 0;
                        }
                        this.audiofail.play();
                    }

                    this.grid = this.grid.map(item =>
                        data.bombs.indexOf(item.index + 1) !== - 1
                            ? { ...item, bomb: true }
                            : { ...item, diamond: true }
                    )
                }

                if(data.instwin !== null) {
                    this.game = {
                        ...this.game,
                        state: 1,
                        total: data.instwin.total,
                        coeff: data.instwin.coeff
                    }

                    if(this.isSounds === 1) {
                        if (!this.audioinstant.paused) {
                            this.audioinstant.pause();
                            this.audioinstant.currentTime = 0;
                        }
                        this.audioinstant.play();
                    }

                    this.grid = this.grid.map(item =>
                        data.instwin.bombs.indexOf(item.index + 1) !== - 1
                            ? { ...item, bomb: true }
                            : { ...item, diamond: true }
                    )

                    this.$root.user.balance = data.instwin.balance
                }
            })
        },
        take() {
            this.$root.axios.post('/mines/take')
            .then(response => {
                const {data} = response

                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        text: data.message,
                        type: 'error'
                    })
                }

                this.game = {
                    ...this.game,
                    state: 1,
                    total: data.total,
                    coeff: data.coeff
                }

                if(this.isSounds === 1) {
                    if (!this.audioinstant.paused) {
                        this.audioinstant.pause();
                        this.audioinstant.currentTime = 0;
                    }
                    this.audioinstant.play();
                }

                this.grid = this.grid.map(item =>
                    data.bombs.indexOf(item.index + 1) !== - 1
                        ? { ...item, bomb: true }
                        : { ...item, diamond: true }
                )

                this.$root.user.balance = data.balance
            })
        },
        typeBet(type) {
            switch(type) {
                case 'min':
                    this.bet = '1.00'
                break;
                case 'max':
                    this.bet = this.$root.user == null ? 0 : (this.$root.user.balance).toFixed(2)
                break;
                case '/2':
                    this.bet = (this.bet / 2).toFixed(2)
                break;
                case 'x2':
                    this.bet = (this.bet * 2).toFixed(2)
                break;
                case 'default':
                    this.bet = (this.bet * 1).toFixed(2)
                break;
            }
        },
        autoSelect() {
            var noActive = document.querySelectorAll('.cell:not(.win)')
            noActive[Math.floor(Math.random() * noActive.length)].click();
        },
        getCoff(step, bombs) {
            !step ? step = 1 : step
            for (var n = 1, a = 0; a < 25 - bombs && step > a; a++)
                n *= (25 - a) / (25 - bombs - a);

            return parseFloat(n).toFixed(2)
        },
        getPrefix(n) {
            if(n >= 1000000) return parseFloat(n/1000000).toFixed(0) + 'M';
            if(n >= 1000) return parseFloat(n/1000).toFixed(0) + 'K';
            return parseFloat(n).toFixed(2)
        },
    },
    watch: {
        bomb: function () {

            this.bomb < 0 ? this.bomb = 3 : this.bomb
            this.bomb > 24 ? this.bomb = 24 : this.bomb

            this.showSlick = false
            this.$nextTick(() => {
                this.showSlick = true
            });
        },
        bet: function () {

            this.bet < 0 ? this.bet = '1.00' : this.bet
            this.bet > 1000000 ? this.bet = '1000000.00' : this.bet

            this.bet = this.$valid(this.bet)
        }
    }
}
</script>

<style scoped>
.winBox {
    align-items: center;
    display: flex;
    height: 100%;
    justify-content: center;
    position: absolute;
    width: 100%;
    z-index: 5;
}
.winT {
    background-color: #fff;
    border: 2px solid #1f51f6;
    border-radius: 5px;
    box-shadow: 2px 2px 2px 0 #0000004a;
    color: #1e50fa;
    padding: 5px 35px;
    position: relative;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.font-weight-500 {
    font-weight: 500;
}
.winT .winsum {
    font-size: 17px;
}
.winT .wincoff {
    font-size: 12px;
}
.redBox {
    bottom: 0;
    height: 100%;
    left: 0;
    margin: 0;
    max-width: 100%;
    opacity: 0;
    pointer-events: none;
    position: absolute;
    right: 0;
    top: 0;
}
.redBox.show {
    opacity: 1;
    pointer-events: auto;
    visibility: visible;
}
.redinp {
    background-color: #fff;
    border: 0;
    border-bottom-right-radius: 5px;
    border-top-right-radius: 5px;
    color: #6782B1!important;
    height: 100%;
    outline: none;
    position: relative;
    text-align: center;
    width: 100%;
}
.amount-number.amounts {
    background-image: linear-gradient(0deg,#5896ff,#387af4)!important;
    color: #fff !important;
}
.amount-number.amounts:hover {
    background-image: linear-gradient(0deg,#4286fa,#296ff0)!important;
}
.stepsCoffs {
    margin-bottom: 9px;
}
@media (max-width: 992px) {
    .slick-slide {
        margin: 0;
    }
    .stepsCoffBox {
        width: 100%;
    }
}

</style>
