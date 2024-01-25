<template>
    <div>
        <Ellipsis v-if="isLoading" />
        <div class="content" v-else>
            <div class="cards col-12 p-0">
                <div class="card-header rows" style="padding: 0;">
                    <span class="col-6 wallet-btns isActive">Пополнить</span>
                    <span class="col-6 wallet-btns" @click="$root.$emit('open', 'withdraw')">Вывести</span>
                </div>
                <div class="pt-4 pb-4 col-12">
                    <div class="withdraw container">
                        <div class="col-6 p-0">
                            <div
                                style="margin-bottom: 1rem; background-color: rgba(0, 128, 0, 0.6); color: white !important; border-radius: 5px; padding: 15px;"
                                v-if="'воскресенье' == eventBuy"
                            >
                                <div class="event-title">Happy Sunday!!!</div>
                                <strong>Каждое воскресенье бонусы при пополнении!</strong>
                                <div>Бонус <strong>+10%</strong> на пополнения от 150 рублей!</div>
                            </div>
                            <div class="inbox mb-2">
                                <label>Выберите систему:</label>
                                <div class="rows">
                                    <div
                                        class="pay-box"
                                        :class="[system == 'aaio_card' ? 'isActive' : '']"
                                        @click="system = 'aaio_card'"
                                    >
                                        <!-- <div class="pay-action">+10%</div> -->
                                        <img src="/assets/image/card.png?v=2" class="pay-img" />
                                        <div class="pay-title">Карты</div>
                                    </div>
                                    <div
                                        class="pay-box"
                                        :class="[system == 'aaio_qiwi' ? 'isActive' : '']"
                                        @click="system = 'aaio_qiwi'"
                                    >
                                        <!-- <div class="pay-action">+10%</div> -->
                                        <img src="/assets/image/qiwi.png" class="pay-img" />
                                        <div class="pay-title">Qiwi Wallet</div>
                                    </div>
                                    <div
                                        class="pay-box"
                                        :class="[system == 'aaio_sbp' ? 'isActive' : '']"
                                        @click="system = 'aaio_sbp'"
                                    >
                                        <!-- <div class="pay-action">+10%</div> -->
                                        <img src="/assets/image/sbp.png?v=2" class="pay-img" />
                                        <div class="pay-title">СБП</div>
                                    </div>
                                    <div
                                        class="pay-box"
                                        :class="[system == 'fk' ? 'isActive' : '']"
                                        @click="system = 'fk'"
                                    >
                                        <img src="/assets/image/fk.svg" style="width: 120px;" class="pay-img" />
                                        <div class="pay-title">FK Wallet</div>
                                    </div>
                                    <div
                                        class="pay-box"
                                        :class="[system == 'aaio_ym' ? 'isActive' : '']"
                                        @click="system = 'aaio_ym'"
                                    >
                                        <!-- <div class="pay-action">+10%</div> -->
                                        <img src="/assets/image/io.svg" class="pay-img" />
                                        <div class="pay-title">Юмани</div>
                                    </div>
                                    <div
                                        class="pay-box"
                                        :class="[system == 'aaio_usdt' ? 'isActive' : '']"
                                        @click="system = 'aaio_usdt'"
                                    >
                                        <!-- <div class="pay-action">+10%</div> -->
                                        <img src="/assets/image/usdt.svg" class="pay-img" />
                                        <div class="pay-title">USDT</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Промокод:</label>
                                <input
                                    type="text"
                                    placeholder="Введите промокод, если есть"
                                    class="form-control"
                                    v-model="promocode"
                                />
                            </div>
                            <div class="form-group mt-3">
                                <label>Введите сумму пополнения:
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="rows mt-1 mb-2">
                                    <button class="amount-number" @click="sum = 200">200</button>
                                    <button class="amount-number" @click="sum = 500">500</button>
                                    <button class="amount-number" @click="sum = 1500">1500</button>
                                    <button class="amount-number" @click="sum = 3000">3000</button>
                                    <button class="amount-number" @click="sum = 5000">5000</button>
                                </div>
                                <input
                                    type="number"
                                    placeholder="Сумма"
                                    class="form-control"
                                    v-model="sum"
                                />
                            </div>
                            <div class="rows with-form-bottom">
                                <button
                                    class="button blue"
                                    style="margin: 0px auto; width: 100%;"
                                    @click="create"
                                >
                                    Перейти к оплате
                                </button>
                            </div>
                            <div class="warning">
                                <img src="/assets/image/icon18.svg" class="age_18" />
                                <p class="t_warning">
                                    Азартные игры призваны развлекать. Помните, что Вы рискуете деньгами, когда делаете ставки. Не тратьте больше, чем можете позволить себе проиграть.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content history cards col-12 mt-5 p-0">
                <table>
                    <thead>
                        <tr>
                            <th>Система</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="payment in payments"
                            :key="payment.id"
                        >
                            <td class="system_wallet">
                                <img src="/assets/image/fk.png" style="height: 30px;" />
                            </td>
                            <td>{{ parseFloat(payment.sum).toFixed(2) }}</td>
                            <td
                                :class="[
                                    {'text-warning': payment.status == 0},
                                    {'text-success': payment.status == 1}
                                ]"
                            >
                                {{ payment.status == 1 ? 'Зачислено на счет' : 'Ожидание' }}
                            </td>
                            <td>{{ $moment(payment.created_at).format('lll') }}</td>
                        </tr>
                        <td colspan="6" class="p-3" v-if="payments.length == 0">История пуста</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import Ellipsis from '../components/ui/loader/Ellipsis'

export default {
    components: {
        Ellipsis
    },
    data() {
        return {
            isLoading: true,
            system: 'fk',
            promocode: null,
            sum: null,
            payments: null
        }
    },
    methods: {
        create() {
            if(!this.sum) {
                return this.$root.$emit('noty', {
                    title: 'Ошибка',
                    text: 'Заполните все поля',
                    type: 'error'
                })
            }

            this.$root.axios.post('/payment/create', {
                amount: this.sum,
                code: this.promocode,
                system: this.system
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

                location.href = data.url
            })
        },
        init() {
            this.$root.axios.post('/payment/init')
            .then(response => {
                const {data} = response

                this.isLoading = false
                this.payments = data.payments
            })
        }
    },
    computed: {
        eventBuy: function() {
            return this.$moment().format("dddd")
        }
    },
    mounted() {
        this.init()
    }
}
</script>


<style scoped>
.pay-text {
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 300;
    flex-direction: column;
    user-select: none;
    position: relative
}
.pay-action {
    position: absolute;
    right: 0px;
    top: 0px;
    background: #0c7f26;
    border-radius: 0 0 0 6px;
    padding: 2px;
    color: #fff;
    font-size: 13px;
    min-width: 41px;
}
.warning {
    align-items: center;
    display: flex;
}
img.age_18 {
    height: 36px;
    width: 36px;
}
p.t_warning {
    font-size: 12px;
    line-height: 14px;
    margin-left: 10px;
    padding-top: 16px;
}
table tr {
    font-weight: 400 !important;
}
.card-header {
    text-align: center;
}
.col-6 {
    margin: 0 auto;
}
table {
    text-align: center;
    width: 100%;
}
.amount-number {
    border: 1px solid #ced4da;
    border-radius: 5px;
    flex: auto;
    margin-right: 5px;
}
.amount-number:last-child {
    margin: 0;
}
.event-title {
    -webkit-animation: event__tilte 3s infinite;
    animation: event__tilte 3s infinite;
    background-color: #ffd9d9;
    border-radius: 5px;
    color: #ff3e3e;
    font-weight: 600;
    padding: 5px;
    position: absolute;
    right: -31px;
    top: -1px;
}
@-webkit-keyframes event__tilte {
    0% {
        transform: rotate(35deg) scale(1);
    }
    50% {
        transform: rotate(25deg) scale(1.1);
    }
    to {
        transform: rotate(35deg) scale(1);
    }
}
@keyframes event__tilte {
    0% {
        transform: rotate(35deg) scale(1);
    }
    50% {
        transform: rotate(25deg) scale(1.1);
    }
    to {
        transform: rotate(35deg) scale(1);
    }
}
@-webkit-keyframes event__action {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    to {
        transform: scale(1);
    }
}
@keyframes event__action {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    to {
        transform: scale(1);
    }
}
@media (max-width: 500px) {
    .with-form-bottom {
        flex-direction: column;
    }
    .with-form-bottom .text {
        display: none;
    }
    .with-form-bottom .button {
        width: 100%;
    }
}

.inbox > .rows {
    flex-wrap: wrap;
    gap: 10px;
}
</style>
