<template>
    <div>
        <Ellipsis v-if="isLoading" />
        <div class="content cards col-12 p-0" v-else>
            <div class="pt-4 pb-4 col-12">
                <div class="ref container">
                    <div class="blue ref-title">Получай <strong>{{ refReward }} Р.</strong> за каждого реферала 1-го уровня!</div>
                    Как только ваш реферал 1 lvl подпишется на группу VK и Telegram,<br />
                    получит ежедневный бонус, вы получите на реферальный баланс {{ refReward }} Р.<br />
                    <br />
                    <h6>Играйте вместе с друзьями и зарабатывайте еще больше!</h6>
                    <label class="desc">
                        Каждый раз, когда ваш приведенный друг по реферальной ссылке будет совершать депозит, вы будете получать дополнительный бонус на счет. Это правило также распространяется на рефералов ваших друзей, которых привели в
                        игру вы.
                    </label>
                    <div>
                        <div class="col-5 p-0">
                            <h6 class="mt-3">Ваша реферальная ссылка:</h6>
                            <div class="input-group mb-2 col-12 p-0">
                                <input 
                                    type="text" 
                                    disabled="disabled" 
                                    class="form-control bg-white" 
                                    v-model="link"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text blue" @click="copyRef">
                                        Скопировать
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 p-0">
                            <h6 class="mt-3">Ваш доход:</h6>
                            <div class="input-group mb-2 col-12 p-0">
                                <input 
                                    type="text" 
                                    disabled="disabled" 
                                    class="form-control bg-white" 
                                    v-model="refIncome"
                                />
                                <div class="input-group-append">
                                    <div class="input-group-text blue" @click="take">
                                        Забрать
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="history">
                        <table class="mt-3 mb-3">
                            <thead>
                                <tr>
                                    <th>Уровень</th>
                                    <th>Рефералов</th>
                                    <th>Доход</th>
                                    <th>Процент</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1 уровень</td>
                                    <td>{{ data.lvl_1.count }}</td>
                                    <td class="text-success">{{ parseFloat(data.lvl_1.income).toFixed(2) }}</td>
                                    <td>10%</td>
                                </tr>
                                <tr>
                                    <td>2 уровень</td>
                                    <td>{{ data.lvl_2.count }}</td>
                                    <td class="text-success">{{ parseFloat(data.lvl_2.income).toFixed(2) }}</td>
                                    <td>3%</td>
                                </tr>
                                <tr>
                                    <td>3 уровень</td>
                                    <td>{{ data.lvl_3.count }}</td>
                                    <td class="text-success">{{ parseFloat(data.lvl_3.income).toFixed(2) }}</td>
                                    <td>2%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <h6 class="mt-3">Как это работает?</h6>
                        <label class="desc">Все ваши рефералы станут для вас рефералами 1-го уровня и будут приносить вам 10% от депозитов.</label>
                        <label class="desc">Рефералы ваших рефералов (1-го уровня) станут для вас рефералами 2-го уровня и будут приносить 3% от депозитов.</label>
                        <label class="desc">Рефералы 2-го уровня станут для вас рефералами 3-го уровня и будут вам приносить 2% от депозитов.</label>
                    </div>
                    <div>
                        <h6 class="mt-3">Условиями работы партнерской программы запрещено:</h6>
                        <label class="desc">Привлечение рефералов с помощью спама!</label><br />
                        <label class="desc">Использование собственных или специально зарегистрированных аккаунтов.</label><br />
                        <label class="desc">Привлечение рефералов путем обмана.</label><br />
                        <label class="desc">Нарушители будут оштрафованы или заблокированы в партнерской программе.</label>
                    </div>
                </div>
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
            data: null,
            refIncome: 0,
            refReward: 0,
            link: null
        }
    },
    methods: {
        init() {
            this.$root.axios.post('/referral/get')
            .then(response => {
                const {data} = response

                this.isLoading = false
                this.refIncome = parseFloat(data.ref_income).toFixed(2)
                this.refReward = data.ref_reward
                this.link = data.link
                this.data = data.data
            })
        },
        take() {
            this.$root.axios.post('/referral/take')
            .then(response => {
                const {data} = response

                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        text: data.message,
                        type: 'error'
                    })
                }
                
                this.refIncome = '0.00'
                this.$root.user.balance = data.balance
            })
        },
        copyRef() {
            this.$clipboard(this.link)
            this.$root.$emit('noty', {
                title: 'Успешно',
                text: 'Сохранено в буфер обмена',
                type: 'success'
            })
        }
    },
    mounted() {
        this.init()
    }
}
</script>

<style scoped>
.ref {
    padding: 10 15px;
}
.ref .desc {
    font-size: 15px;
}
.refBox {
    border: 1px solid #87919a;
    border-radius: 5px;
    flex: auto;
    margin-right: 15px;
    padding: 5px;
}
.refCount {
    font-size: 14px;
}
.refIncome {
    font-size: 15px;
}
.refBox:last-child {
    margin: 0;
}
.refLvl {
    font-size: 12px;
}
.blue {
    font-size: 14px;
}
.ref-title {
    border-radius: 3px;
    color: #fff;
    font-size: 15px;
    margin-bottom: 1rem;
    padding: 10px;
    text-align: center;
}

</style>