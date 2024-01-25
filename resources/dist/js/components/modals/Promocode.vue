<template>
    <b-modal id="promocode" hide-footer>
        <template #modal-title>
            <svg width="42px" height="42px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" style="margin-right: 6px;margin-bottom: 4px;"><g id="SVGRepo_bgCarrier" stroke-width="0"></g>

            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

            <g id="SVGRepo_iconCarrier"> <title>gift_fill</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Business" transform="translate(-768.000000, -144.000000)"> <g id="gift_fill" transform="translate(768.000000, 144.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M20,13 L20,18 C20,19.6569 18.6569,21 17,21 L17,21 L13,21 L13,13 L20,13 Z M11,13 L11,21 L7,21 C5.34315,21 4,19.6569 4,18 L4,18 L4,13 L11,13 Z M9,2 C10.1947,2 11.2671,2.52376 12,3.35418 C12.7329,2.52376 13.8053,2 15,2 L15,2 L15.5,2 C16.3284,2 17,2.67157 17,3.5 L17,3.5 L17,4 C17,4.72857 16.8052,5.41165 16.4649,6 L16.4649,6 L19,6 C20.1046,6 21,6.89543 21,8 L21,8 L21,10 C21,10.3643 20.9026,10.7058 20.7324,11 L20.7324,11 L13,11 L13,8 C13,7.44772 12.5523,7 12,7 C11.4477,7 11,7.44772 11,8 L11,8 L11,11 L3.26756,11 C3.09739,10.7058 3,10.3643 3,10 L3,10 L3,8 C3,6.89543 3.89543,6 5,6 L5,6 L7.53513,6 C7.19479,5.41165 7,4.72857 7,4 L7,4 L7,3.5 C7,2.67157 7.67157,2 8.5,2 L8.5,2 Z M9,4 C9,5.10457 9.89543,6 11,6 C11,4.89543 10.1046,4 9,4 Z M15,4 C13.8954,4 13,4.89543 13,6 C14.1046,6 15,5.10457 15,4 Z" id="形状结合" fill="#4989F7"> </path> </g> </g> </g> </g>

        </svg>
            Промокод
        </template>
        <div class="rows" style="flex-direction: column">
            <div class="col-12" style="font-size:17px;padding:0;color:#a6bde6">
                Ищите промокоды в наших соц. сетях
            </div>
            <div class="col-12 social-btns" style="padding:0;display:flex">
                <div class="col-6" style="padding:0">
                    <button @click="openLink('https://t.me/lucker_tg')" class="social-btn telegram">
                        Telegram
                    </button>
                </div>
                <div class="col-6" style="padding:0">
                    <button @click="openLink('https://vk.com/lucker_vk')" class="social-btn vkontakte">
                        ВКонтакте
                    </button>
                </div>
            </div>
            <div class="col-12 mt-4" style="padding:0">
                <svg style="display:none;">
                    <symbol id='ticket' viewBox="0 0 32 32">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                    <g id="SVGRepo_iconCarrier"> <path id="ticket" d="M19.8501 12.9408C19.8501 13.7408 20.5001 14.4008 21.3001 14.4008C21.6801 14.4008 22.0001 14.7108 22.0001 15.0908C22.0001 18.9308 20.8401 20.0908 17.0001 20.0908H11.7501V18.5008C11.7501 18.1108 11.4501 17.7908 11.0701 17.7608C11.0501 17.7508 11.0201 17.7508 11.0001 17.7508C10.5901 17.7508 10.2501 18.0908 10.2501 18.5008V20.0908H8.49009C6.61009 20.0908 5.64009 18.6808 4.76009 16.5508L4.59009 16.1308C4.45009 15.7708 4.62009 15.3608 4.98009 15.2208C5.35009 15.0808 5.64009 14.7908 5.79009 14.4108C5.95009 14.0408 5.95009 13.6308 5.80009 13.2608C5.48009 12.4908 4.60009 12.1208 3.82009 12.4308C3.65009 12.5108 3.45009 12.5108 3.28009 12.4308C3.11009 12.3608 2.98009 12.2208 2.90009 12.0408L2.75009 11.6408C1.26009 8.02079 1.91009 6.47079 5.53009 4.97079L7.98009 3.96079C8.34009 3.81079 8.75009 3.98079 8.89009 4.34079L11.0701 9.09079C10.6601 9.09079 10.2501 9.42079 10.2501 9.83079V14.1708C10.2501 14.5808 10.5901 14.9208 11.0001 14.9208C11.0201 14.9208 11.0501 14.9208 11.0701 14.9108C11.4501 14.8808 11.7501 14.5608 11.7501 14.1708V9.83079C11.7501 9.44079 11.4501 9.12079 11.0701 9.09079V4.93079H17.0001C20.8401 4.93079 22.0001 6.09079 22.0001 9.93079V10.7808C22.0001 11.1708 21.6801 11.4808 21.3001 11.4808C20.5001 11.4808 19.8501 12.1308 19.8501 12.9408Z"/> </g>
                    </symbol>
                </svg>
                <svg class='input__icon'>
                    <use xlink:href='#ticket'></use>
                </svg>
                <input type="text" v-model="promocode" style="margin-bottom:0" v-on:focus="changePlaceholder('Можете вводить код')"
                       v-on:blur="changePlaceholder('Введите код')"
                       :placeholder="placeholder" class="form-control form promo-input">
            </div>
            <div class="col-12 mt-4" style="padding:0">
                <button class="activate-btn" @click="activate">Активировать</button>
            </div>
        </div>
    </b-modal>
</template>

<script>
export default {
    data() {
        return {
            placeholder: "Введите код",
            promocode: null,
            promocoder: null,
            create: {
                code: '',
                activation: '',
                sum: ''
            },
            isLoading: false
        };
    },
    methods: {
        changePlaceholder(value) {
            this.placeholder = value;
        },
        openLink(link) {
            window.open(link, "_blank");
        },
        clearInput() {
            this.promocode = '';
        },
        waitNoty() {
            this.$root.$emit('noty', {
                title: 'Подождите',
                text: 'Выполняем активацию промокода',
                type: 'warning'
            })
        },
        activate() {
            if(!this.promocode) {
                return this.$root.$emit('noty', {
                    title: 'Ошибка',
                    text: 'Заполните все поля',
                    type: 'error'
                })
            }
            this.waitNoty()
            this.promocoder = this.promocode
            this.promocode = ''
            this.$root.axios.post('/promo/activate', {
                code: this.promocoder,
            })
                .then(response => {
                    const {data} = response
                    if(data.showModal) {
                        this.$bvModal.hide('promocode')
                        this.$bvModal.show('connectTg')
                    }

                    if(data.error) {
                        return this.$root.$emit('noty', {
                            title: 'Ошибка',
                            text: data.message,
                            type: 'error'
                        })
                    }

                    this.clearInput()
                    this.$root.user.balance = data.balance

                    this.$root.$emit('noty', {
                        title: 'Успешно',
                        text: data.text,
                        type: 'success'
                    })

                    this.$bvModal.hide('promocode')
                })
        }
    },
};
</script>
