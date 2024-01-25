<template>
    <b-modal id="connectTg">
        <template #modal-title>Подписка на Telegram</template>
        <label>Привет! Чтобы разблокировать бонусы, Вам нужно привязать свой аккаунт к нашему боту и подписаться на наш телеграм канал</label>
        <form class="">
            <div role="group" class="form-group">
                <label for="input-1" class="d-block">Ваша уникальная команда:</label>
                <div>
                    <input 
                        type="text" 
                        class="form-control" 
                        :value="'/bind ' + $root.user.unique_id"
                        v-if="$root.user !== null"
                        disabled="true"
                    />
                </div>
            </div>
        </form>
        <div>
            <h6>Что нужно сделать?</h6>
            <label>1) Подписаться на <a :href="$root.config.tg_channel" target="_blank">наш телеграм канал</a></label>
            <label>2) Отправить команду <a :href="$root.config.tg_bot" target="_blank">нашему боту</a></label> 
            <label>Все! Теперь вам доступны все бонусы!</label>
        </div>
    </b-modal>
</template>

<script>
export default {
    sockets: {
        connectTelegram(data) {
            if(this.$root.user !== null && data.user_id == this.$root.user.id) {
                this.$bvModal.hide('connectTg')
                return this.$root.$emit('noty', {
                    title: 'Успех',
                    text: 'Telegram привязан!',
                    type: 'success'
                })
            }
        }
    }
}
</script>