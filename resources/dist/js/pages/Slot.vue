<template>
<div class="container">
	<div id="back"><img src="/assets/image/external.svg" /></div>
	<div class=" ">
		<div class="game_slot">
			<div class="game-component">
				<div class="casino-play__controls" style="width: 100%;">
					<router-link to="/slots" class="router-link-active blue">
						<div class="casino-play__control casino-play__control_change blue"><span>Назад</span></div>
					</router-link>
					<div id="game_name" class="casino-play__name casino-play__control_change2">{{ slot.title }}</div>
					<div role="button" class="casino-play__control casino-play__control_fullscreen blue" @click="fullscreen"><img src="/assets/image/fullscreen.svg" /></div>
				</div>
				<div data-v-a35605fa="" class="casino-play__wrapper-place">
					<iframe
						id="iframe_slot"
						scrolling="no"
						frameborder="0"
						webkitallowfullscreen="true"
						allow="fullscreen"
						mozallowfullscreen="true"
						:src="slot.link"
					></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            slot: {
                title: '',
                link: ''
            },
            type: 'real',
            noty: {
                mess: null,
                type: null
            }
        }
    },
    mounted() {
        this.getSlot(this.$route.params.id);
    },
    methods: {
        getSlot(id) {
            if(this.$route.params.type == 'demo') this.type = 'demo';

            axios.post('/slots/load', {id: id, type: this.type}).then(response => {
                var { data } = response

                if(data.error) {
                    this.$router.push("/slots").catch(()=>{});
                    return this.$root.$emit('noty', {
                        title: 'Ошибка',
                        text: data.message,
                        type: 'error'
                    })
                }
                
                this.slot = data
            })
        },
        fullscreen() {  
            var docElm = document.getElementById('iframe_slot');  
            //W3C   
            if (docElm.requestFullscreen) {  
                docElm.requestFullscreen();  
            }  
                //FireFox   
            else if (docElm.mozRequestFullScreen) {  
                docElm.mozRequestFullScreen();  
            }  
                            // Chrome и т. Д.   
            else if (docElm.webkitRequestFullScreen) {  
                docElm.webkitRequestFullScreen();  
            }  
            else if (docElm.webkitFullscreenElement) {
                docElm.webkitFullscreenElement();
            }
            else if (docElm.msFullscreenElement) {
                docElm.msFullscreenElement();
            }
                //IE11   
            else if (docElm.msRequestFullscreen) {  
                docElm.msRequestFullscreen();  
            } else {
                docElm.documentElement;
                docElm.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }  
        }
    },
}
</script>

<style scoped>
#back {
    align-items: center;
    border-radius: 5px;
    cursor: pointer;
    display: none;
    height: 36px;
    justify-content: center;
    left: 0;
    min-width: 36px;
    opacity: 0.7;
    position: absolute;
    top: 0;
    width: 36px;
    z-index: 999;
}
#back > img {
    height: 18px;
    margin: 10px;
    transform: rotate(90deg);
    transition: filter 0.2s ease-in-out;
    width: 18px;
}
@media (max-width: 990px) {
    .casino-play__control_change {
        display: none !important;
    }
    .game_slot {
        top: 10px !important;
    }
    .casino-play__controls {
        margin-bottom: 10px !important;
    }
    .casino-play__name {
        display: block !important;
        margin-left: 4px;
    }
}
@media (min-width: 1000px) {
    .container.slots {
        margin-right: 200px;
        max-width: 1400px !important;
    }
}
@media (max-width: 1000px) {
    .casino-play__name {
        font-size: 14px !important;
        letter-spacing: 1px !important;
    }
}
.col-lg-3 {
    flex: 0 0 20%;
    max-width: 20%;
}
img.random_dice {
    height: 30px !important;
    width: 30px !important;
}
.game_slot {
    display: flex;
    top: -20px;
}
.game-component,
.game_slot {
    align-items: stretch;
    position: relative;
    width: 100%;
}
.casino-play__wrapper-place {
    border-radius: 5px;
    box-shadow: 0 0 20px rgb(143 157 190/80%);
    margin-bottom: 25px;
    padding-top: 56.5%;
    position: relative;
    width: 100%;
}
.casino-play__wrapper-place iframe {
    border-radius: 10px;
    height: 100%;
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 0;
    width: 100%;
}
.mt-5,
.my-5 {
    margin-top: 0 !important;
}
.casino-play__controls {
    align-items: center;
    display: flex;
    margin-bottom: 5px;
    position: relative;
    right: 0;
    top: -10px;
}
.casino-play__control {
    border-radius: 5px;
    cursor: pointer;
    height: 36px;
    min-width: 36px;
    width: 36px;
}
.casino-play__control,
.casino-play__name {
    align-items: center;
    display: flex;
    justify-content: center;
}
.casino-play__name {
    font-size: 22px;
    font-weight: 500;
    letter-spacing: 1px;
    width: 100%;
}
.casino-play__control + .casino-play__control {
    margin-left: 5px;
}
.casino-play__control_change {
    width: 120px;
}
.casino-play__control > img {
    height: 18px;
    transition: filter 0.2s ease-in-out;
    width: 18px;
}
.casino-play__control_change > span {
    color: #fff;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 2px;
    transition: color 0.2s ease-in-out;
}

</style>