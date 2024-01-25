<template>
    <div class="col-12 p-0 bonuses rows">
        <div class="content cards col-4 p-0 mr-4">
            <div class="content-body col-12">
                <div class="container rows justify-content-center">
                    <div class="controlPanel col-12">
                        <h5>Ежедневный бонус (24ч)</h5>
                        <div class="desc">
                            <div>Выполните условия</div>
                            <div class="mt-3">
                                <img src="/assets/image/vk.svg" width="23px" />
                                <span class="ml-1">Подписка на 
                                    <a :href="$root.config.vk_url" target="_blank">группу ВКонтакте</a>
                                </span>
                            </div>
                            <div class="mt-2">
                                <img src="/assets/image/tg.svg" width="23px" />
                                <span class="ml-1">Подпишитесь на наш 
                                    <a :href="$root.config.tg_channel" target="_blank">TG Канал</a>
                                </span>
                            </div>
                        </div>
                        <button 
                            class="blue mt-3 col-12" 
                            @click="takeBonus('daily')" 
                            :disabled="!bonus.daily.active"
                        >
                            {{ bonus.daily.active ? 'Получить бонус' : bonus.daily.finishView }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content cards col-4 p-0 mr-4">
            <div class="content-body col-12">
                <div class="container rows justify-content-center">
                    <div class="controlPanel col-12">
                        <h5>Ежечасный бонус (1ч)</h5>
                        <div class="desc">
                            <div>Выполните условия</div>
                            <div class="mt-3">
                                <img src="/assets/image/vk.svg" width="23px" />
                                <span class="ml-1">Подписка на 
                                    <a :href="$root.config.vk_url" target="_blank">группу ВКонтакте</a>
                                </span>
                            </div>
                            <div class="mt-2">
                                <img src="/assets/image/tg.svg" width="23px" />
                                <span class="ml-1">Подпишитесь на наш 
                                    <a :href="$root.config.tg_channel" target="_blank">TG Канал</a>
                                </span>
                            </div>
                        </div>
                        <button 
                            class="blue mt-3 col-12" 
                            @click="takeBonus('hourly')" 
                            :disabled="!bonus.hourly.active"
                        >
                            {{ bonus.hourly.active ? 'Получить бонус' : bonus.hourly.finishView }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="content cards col-4 p-0">
            <div class="content-body col-12">
                <div class="container rows justify-content-center">
                    <div class="controlPanel col-12">
                        <h5>Одноразовый бонус</h5>
                        <div class="desc">
                            <div>Выполните условия</div>
                            <div class="mt-3">
                                <img src="/assets/image/vk.svg" width="23px" />
                                <span class="ml-1">Подписка на 
                                    <a :href="$root.config.vk_url" target="_blank">группу ВКонтакте</a>
                                </span>
                            </div>
                            <div class="mt-2">
                                <img src="/assets/image/tg.svg" width="23px" />
                                <span class="ml-1">Подпишитесь на наш 
                                    <a :href="$root.config.tg_channel" target="_blank">TG Канал</a>
                                </span>
                            </div>
                        </div>
                        <button 
                            class="blue mt-3 col-12"
                            @click="takeBonus('one')"
                            :disabled="!bonus.one.active"
                        >
                            {{ bonus.one.active ? 'Получить бонус ' + onetime + 'Р' : 'Вы уже получили' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: ['bonus', 'onetime'],
    methods: {
        takeBonus(type) {
            this.$root.axios.post('/bonus/take', {
                type
            })
            .then(response => {
                const {data} = response

                if(data.showModal) this.$bvModal.show('connectTg')
                if(data.error) {
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        type: 'error',
                        text: data.message
                    })
                }

                this.bonus[data.type].active = false

                if(data.type !== 'one') {
                    this.$root.$emit('bonusStartTimer', {
                        remaining: data.remaining,
                        type: data.type
                    })
                }

                this.$root.user.balance = data.balance
                this.$root.$emit('noty', {
                    title: 'Успешно',
                    type: 'success',
                    text: data.text
                })
            })
        }, 
    }    
}
</script>

<style scoped>
.bonuses {
    display: flex;
}
.promo {
    font-size: 14px;
    text-align: start;
}
.promocode {
    display: flex;
    justify-content: space-between;
}
.controlPanel.active {
    max-height: 170px;
    overflow: auto;
}
.activePromo .title {
    font-weight: 500;
}
.activePromo .date {
    overflow: hidden;
    text-overflow: ellipsis;
}
.bonuses .content,
.promocode .content {
    flex: auto;
}
.sends {
    background-color: #2483a7 !important;
    width: 100%;
}
.sends,
.sends:hover {
    color: #fff !important;
}
.sends:hover {
    background-color: #197294 !important;
}
.controlPanel .desc {
    font-size: 15px;
}
</style>