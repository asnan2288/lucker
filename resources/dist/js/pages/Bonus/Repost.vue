<template>
    <div class="content cards col-12 p-0 mt-2 mb-2 rows">
        <div class="kkre">
            <div class="like">
                <div class="balanceBox">
                    <div class="title">Ваш бонусный баланс</div>
                    <h5 class="balance">
                        <IOdometer 
                            class="iOdometer" 
                            :value="bonusBalance" 
                        />
                    </h5>
                    <button 
                        class="blue mt-3 col-12" 

                        @click="transfer"
                    >
                        Перевести на реальный счет
                    </button>
                    <br />
                    <button 
                        class="ser mt-2" 
                        style="width: 100%;" 
                        :disabled="isLoading.check" 
                        @click="checkReposts"
                    >
                        <svg
                            v-if="isLoading.check"
                            viewBox="0 0 16 16"
                            width="1em"
                            height="1em"
                            focusable="false"
                            role="img"
                            aria-label="three dots"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            class="bi-three-dots b-icon bi b-icon-animation-cylon"
                        >
                            <g><path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"></path></g>
                        </svg>
                        <span v-else>Проверить посты</span>
                    </button>
                </div>
                <div class="likeBonusBox">
                    <div class="likeBonusDesc">
                        <h5>Бонус за репост</h5>
                        <div class="like-item">
                            <svg
                                viewBox="0 0 16 16"
                                width="1em"
                                height="1em"
                                focusable="false"
                                role="img"
                                aria-label="check circle fill"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                class="bi-check-circle-fill b-icon bi text-success"
                            >
                                <g>
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </g>
                            </svg>
                            Делай репосты постов и получай бонус!
                        </div>
                        <div class="like-item">
                            <svg
                                viewBox="0 0 16 16"
                                width="1em"
                                height="1em"
                                focusable="false"
                                role="img"
                                aria-label="check circle fill"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                class="bi-check-circle-fill b-icon bi text-success"
                            >
                                <g>
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </g>
                            </svg>
                            Чем больше репостов, тем больше бонус
                        </div>
                        <div class="like-item">
                            <svg
                                viewBox="0 0 16 16"
                                width="1em"
                                height="1em"
                                focusable="false"
                                role="img"
                                aria-label="check circle fill"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                class="bi-check-circle-fill b-icon bi text-success"
                            >
                                <g>
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </g>
                            </svg>
                            Учитываются только 15 последних постов
                        </div>
                        <div class="like-item">
                            <svg
                                viewBox="0 0 16 16"
                                width="1em"
                                height="1em"
                                focusable="false"
                                role="img"
                                aria-label="check circle fill"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor"
                                class="bi-check-circle-fill b-icon bi text-success"
                            >
                                <g>
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                                </g>
                            </svg>
                            Аккаунт должен быть открыт
                        </div>
                    </div>
                </div>
            </div>
            <div class="like-levels">
                <h6>СИСТЕМА УРОВНЕЙ</h6>
                <div class="rows">
                    <div
                        v-for="(level, index) in levels"
                        :key="level"
                        :class="[
                            'likeLevlBox',
                            { 'mt-1': index <= 4 },
                            { 'mt-3': index > 4 }
                        ]"
                    >
                        <div class="rows">
                            <div class="level">{{ level.title }}</div>
                            <div class="likeBonus" :style="{color: level.background}">{{ level.reward }}</div>
                        </div>
                        <div class="lvl">{{ `${total > level.goal ? level.goal : total} / ${level.goal}` }}</div>
                        <div class="progressBar">
                            <div
                                class="progressB"
                                :style="{
                                    backgroundColor: level.background,
                                    width: parseFloat((total / level.goal) * 100, 100).toFixed(2) + '%'
                                }"
                            />
                        </div>
                        <div class="sumDep">{{ level.goal }} репостов</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import IOdometer from 'vue-odometer';

export default {
    props: ['total', 'levels', 'bonusBalance'],
    components: {
        IOdometer
    },
    data() {
        return {
            isLoading: {
                check: false,
                transfer: false
            }
        }
    },
    methods: {
        transfer() {
            this.isLoading.transfer = true
            this.$root.axios.post('/bonus/transfer')
            .then(response => {
                const {data} = response
                this.isLoading.transfer = false;

                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        type: 'error',
                        text: data.message
                    })
                }

                this.$root.user.balance = data.balance
                this.bonusBalance = 0
            })
        },
        checkReposts() {
            this.isLoading.check = true
            this.$root.axios.post('/bonus/checkReposts')
            .then(response => {
                const {data} = response
                this.isLoading.check = false;

                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        type: 'error',
                        text: data.message
                    })
                }

                this.bonusBalance = data.bonusBalance
                this.total = data.total
            })
        },
    }
}
</script>

<style scoped>
.rows {
    flex-wrap: wrap;
}

.like {
    align-items: center;
    display: flex;
    justify-content: space-between;
    width: 100%;
}
.kkre {
    padding: 50px;
    width: 100%;
}
.balanceBox .title {
    padding-top: 5px;
    text-align: center;
}
.balanceBox {
    padding-left: 5%;
}
.balance {
    margin: 9px 0;
    text-align: center;
}
.like-item {
    margin-top: 4px;
}
.likeBonus {
    color: #235ed7;
    font-weight: 600;
}
.like-levels {
    margin-top: 2rem;
}
.sumDep {
    color: #4b556f;
    font-size: 13px;
    margin-top: 0.1rem;
    text-align: right;
}
.likeLevlBox {
    background-color: #f1f2fd52;
    border-radius: 5px;
    flex: auto;
    margin-right: 2rem;
    padding: 8px;
    max-width: 170px;
}
.likeBonus {
    margin-left: 2rem;
}
.progressBar {
    background-color: #f0f1f7;
    border-radius: 3px;
    height: 8px;
    width: 100%;
}
.progressB {
    border-radius: 3px;
    height: 100%;
    transition: 0.5s;
    max-width: 100%
}
.lvl {
    color: #4b556f;
    font-size: 12px;
}
.likeLevlBox .rows {
    justify-content: space-between;
}
.progressB.purple {
    background-color: #a528a7;
}
.progressB.red {
    background-color: #a72828;
}
.progressB.blues {
    background-color: #2872a7;
}
.progressB.green {
    background-color: #28a745;
}
.progressB.pink {
    background-color: #407bff;
}
.likeBonus.purple {
    color: #a528a7;
}
.likeBonus.red {
    color: #a72828;
}
.likeBonus.blues {
    color: #2872a7;
}
.likeBonus.green {
    color: #28a745;
}
.likeBonus.pink {
    color: #407bff;
}
.odometer {
    font-weight: 600;
}
@media (max-width: 992px) {
    .like {
        flex-direction: column-reverse;
    }
    .likeBonusBox {
        width: 100%;
    }
    .like-levels .rows {
        flex-wrap: wrap;
    }
    .balanceBox,
    .balanceBox button {
        width: 100%;
    }
    .balanceBox .title {
        font-size: 20px;
        font-weight: 800;
    }
}
</style>