<template>
    <b-modal id="aboutAllin">
        <template #modal-title>Игровой режим ALL IN</template>
        <label>В игровом режиме <b>ALL IN</b> Ваша ставка всегда равна всему Вашему балансу. Вы лишь выбираете множитель (во сколько раз Вы хотите увеличить свой баланс) и делаете ставку. Зачем Вам ставить весь свой баланс в режиме <b>ALL IN</b>? Здесь всегда действует определенный <b>бонус</b> к выигрышам! Просто за то, что Вы делаете ставку в данном игровом режиме, к каждому выигрышу будет начислен бонус.</label>
        <form class="mb-1">
            <div role="group" class="form-group">
                <label for="input-1" class="d-block">Актуальный бонус:</label>
                <div>
                    <input
                        type="text"
                        class="form-control"
                        :value="'+20%'"
                        disabled="true"
                    />
                </div>
            </div>
        </form>
        <!--<form class="">
            <div role="group" class="form-group">
                <label for="input-1" class="d-block">Бонус при наличии депозита <b>от 50р за сегодня</b>:</label>
                <div>
                    <input
                        type="text"
                        class="form-control"
                        :value="'+40%'"
                        disabled="true"
                    />
                </div>
            </div>
        </form>-->
    </b-modal>
</template>
