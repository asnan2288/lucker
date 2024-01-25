<template>
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
                            <div class="buttons bombs rows">
                                <button
                                    class="amount-number"
                                    :class="[level == 1 ? 'active' : '']"
                                    @click="level = 1"
                                    :disabled="btnLoading"
                                >
                                    Легкий
                                </button>
                                <button
                                    class="amount-number"
                                    :class="[level == 2 ? 'active' : '']"
                                    @click="level = 2"
                                    :disabled="btnLoading"
                                >
                                    Средний
                                </button>
                                <button
                                    class="amount-number"
                                    :class="[level == 3 ? 'active' : '']"
                                    @click="level = 3"
                                    :disabled="btnLoading"
                                >
                                    Сложный
                                </button>
                            </div>
                        </div>
                        <div class="controlPanel mt-4 mb-3 mines-bets">
                            <label>Сумма игры</label>
                            <div class="mines-amount">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text amount-number amounts" :disabled="btnLoading" @click="typeBet('min')">Min</button>
                                        <button class="input-group-text amount-number amounts" :disabled="btnLoading" @click="typeBet('/2')">x/2</button>
                                    </div>
                                    <input
                                        type="number"
                                        class="form-control form"
                                        v-model="bet"
                                        @change="typeBet('default')"
                                        :disabled="btnLoading"
                                    />
                                    <div class="input-group-append">
                                        <button class="input-group-text amount-number amounts" :disabled="btnLoading" @click="typeBet('x2')">x2</button>
                                        <button class="input-group-text amount-number amounts" :disabled="btnLoading" @click="typeBet('max')">Max</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                            class="btn-play blue mt-3 col-12"
                            @click="play"
                            :disabled="btnLoading"
                        >
                            Начать игру
                        </button>
                    </div>
                    <div id="circle-container" class="col-xs-12 height-100">
                        <div class="legend-wheel">
                            <div class="legend-wheel-circle">
                                <img :src="'/assets/image/wheel/' + level + '.png?v=2'" class="legend-wheel-img" />
                                <div class="legend-wheel-inset"></div>
                                <div class="legend-wheel-arrow"></div>
                            </div>
                            <div class="legend-wheel-inner" v-if="!game.end">
                                <div class="legend-wheel-coefficient">
                                    <div class="legend-wheel-coefficient-box" v-if="level == 1">
                                        <div class="legend-wheel-coefficient-list">
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16"><circle fill="#273451" r="7" cx="7" cy="7"></circle></svg>
                                                <span>x 0.0</span>
                                            </div>
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16"><circle fill="#5480f2" r="7" cx="7" cy="7"></circle></svg>
                                                <span>x 1.2</span>
                                            </div>
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16"><circle fill="#f34102" r="7" cx="7" cy="7"></circle></svg>
                                                <span>x 1.5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="legend-wheel-coefficient-box" v-if="level == 2">
                                        <div class="legend-wheel-coefficient-list">
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16"><circle fill="#273451" r="7" cx="7" cy="7"></circle></svg> <span>x 0.0</span>
                                            </div>
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16"><circle fill="#5480f2" r="7" cx="7" cy="7"></circle></svg> <span>x 1.2</span>
                                            </div>
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16"><circle fill="#f34102" r="7" cx="7" cy="7"></circle></svg> <span>x 1.5</span>
                                            </div>
                                        </div>
                                        <div class="legend-wheel-coefficient-list">
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16" xmlns="http://www.w3.org/2000/svg"><circle fill="#91dc00" r="7" cx="7" cy="7"></circle></svg> <span>x3.0</span>
                                            </div>
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16" xmlns="http://www.w3.org/2000/svg"><circle fill="#ed44cc" r="7" cx="7" cy="7"></circle></svg> <span>x5.0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="legend-wheel-coefficient-box" v-if="level == 3">
                                        <div class="legend-wheel-coefficient-list">
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16" xmlns="http://www.w3.org/2000/svg"><circle fill="#24304a" r="7" cx="7" cy="7"></circle></svg> <span>x0.0</span>
                                            </div>
                                            <div class="legend-wheel-coefficient-item">
                                                <svg width="16" height="16" viewBox="-1 -1 16 16" xmlns="http://www.w3.org/2000/svg"><circle fill="#5983b4" r="7" cx="7" cy="7"></circle></svg> <span>x49.5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="legend-wheel-inner" v-else>
                                <div class="legend-wheel-winner">
                                    <span class="legend-wheel-winner-prize">
                                        <span class="legend-wheel-prize-integer">{{ game.win }}</span>
                                    </span>
                                    <div
                                        class="legend-wheel-winner-coefficient"
                                        style="background-color: rgb(255, 255, 255);"
                                    >
                                        x {{ game.coef }}
                                    </div>
                                </div>
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
export default {
    data() {
        return {
            level: 1,
            bet: '1.00',
            btnLoading: false,
            isSounds: 1,
            volume: 100,
            audiosuc: new Audio('https://luc1.fun/suc_dice.mp3'),
            audiofail: new Audio('https://luc1.fun/fail_dice.mp3'),
            audiostart: new Audio('https://luc1.fun/start_wheel.mp3?v=2'),
            audios: [],
            game: {
                end: false
            },
            position: [
                {},
                {
                    blue: [444, 500, 507, 514, 535, 542, 550, 560, 570, 590, 606, 630],
                    red: [735, 736, 162],
                    lose: [24, 130, 135, 492, 496]
                },
                {
                    blue: [496, 668, 535, 520, 524, 534, 564, 594, 637],
                    red: [707, 710, 1500, 1503, 625],
                    green: [752, 755, 1472, 1475],
                    pink: [505, 506, 507, 508, 509, 510],
                    lose: [498, 530, 1477, 1479, 1505, 603, 629, 672, 515]
                },
                {
                    pink: [1540, 1535, 1539, 1537],
                    lose: [1000, 1050, 1532, 1543, 783, 283, 400, 900, 990, 1990, 1190, 590, 225, 825]
                }
            ],
            winDegree: 0,
        }
    },
    created() {
        this.audios = [this.audiosuc, this.audiofail, this.audiostart];
    },
    methods: {
        toggleSounds() {
            this.isSounds = this.isSounds === 1 ? 0 : 1;
            if(this.isSounds === 0) {
                this.volume = 0;
            } else {
                this.volume = 100;
                this.changeVolume();
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
        play() {
            this.btnLoading = true
            this.game.end = false

            this.$root.axios.post('/wheel/start', {
                bet: this.bet,
                level: this.level
            })
            .then(response => {
                const {data} = response

                if(data.error) {
                    this.btnLoading = false;
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

                this.$root.user.balance -= parseFloat(this.bet)

                const position = this.position[this.level][data.color];
                const random = this.getRandomInt(0, position.length - 1);
                const degree = position[random];

                this.startAnimation(degree)

                setTimeout(() => {
                    this.$root.user.balance = data.balance
                    this.btnLoading = false;

                    this.game = {
                        win: data.win,
                        coef: data.coef,
                        end: true
                    }
                    setTimeout(() => this.game.end = false, 4000)
                    if(this.isSounds === 1) {
                        if (!this.audiostart.paused) {
                            this.audiostart.pause();
                            this.audiostart.currentTime = 0;
                        }
                        if(data.win > 0) {
                            if (!this.audiosuc.paused) {
                                this.audiosuc.pause();
                                this.audiosuc.currentTime = 0;
                            }
                            this.audiosuc.play();
                        } else {
                            if (!this.audiofail.paused) {
                                this.audiofail.pause();
                                this.audiofail.currentTime = 0;
                            }
                            this.audiofail.play();
                        }
                    }

                }, 4500);
            })
        },
        getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min
        },
        startAnimation(deg) {
            if(screen.width <= 760) {
                deg -= 90;
            }

            this.winDegree += deg + (360 * 2) - (this.winDegree % 360)

            const wheel = document.querySelector('.legend-wheel-img')
            wheel.style.transform = `rotate(${this.winDegree}deg)`

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
    },
    watch: {
        bet: function () {

            this.bet < 0 ? this.bet = '1.00' : this.bet
            this.bet > 1000000 ? this.bet = '1000000.00' : this.bet

            this.bet = this.$valid(this.bet)
        }
    }
}
</script>

<style scoped>
.legend-wheel {
    width: 448px;
    height: 448px;
}

@media(max-width: 760px) {
    .legend-wheel {
        width: 320px;
        height: 320px
    }
}

@media(max-width: 370px) {
    .legend-wheel {
        width: 270px;
        height: 270px
    }
}

.amount-number.amounts {
    background-image: linear-gradient(0deg,#5896ff,#387af4)!important;
    color: #fff!important;
}
</style>
