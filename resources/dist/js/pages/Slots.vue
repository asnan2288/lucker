<template>
    <div class="col-12 content cards mb-3 p-3">
        <div class="slots_p">
            <div class="s1">
                <div class="s2">
                    <div class="s3">
                        <div v-for="h in history" :key="h.id">
                            <router-link :to="'/slots/game/' + h.game_id" class="live_">
                                <div class="live_img">
                                    <img :src="h.image">
                                </div>
                                <div class="live">
                                    <span class="slotname">{{ h.slot_name }}</span>
                                    <span class="username">{{ h.username }}</span>
                                    <span class="coef">x {{ h.coef }}</span>
                                    <span class="number">{{ h.win.toFixed(2) }}</span>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="slots_box">
                <div class="search_">
                    <input 
                        type="search" 
                        placeholder="Поиск..." 
                        v-model="search"
                    />
                </div>
                <div class="b1_">
                    <div class="casino-set casino-provider casino-icons blue" @click="randomSlot">
                        <span>
                            <img style="height: 26px; width: 26px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTAwcHgiIGhlaWdodD0iMTAwcHgiIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiB2ZXJzaW9uPSIxLjEiPgo8ZyBpZD0ic3VyZmFjZTEiPgo8cGF0aCBzdHlsZT0iIHN0cm9rZTpub25lO2ZpbGwtcnVsZTpub256ZXJvO2ZpbGw6cmdiKDEwMCUsMTAwJSwxMDAlKTtmaWxsLW9wYWNpdHk6MTsiIGQ9Ik0gNDkuOTUzMTI1IDguNzQyMTg4IEMgNDguNzQ2MDk0IDguNzQyMTg4IDQ3LjUzOTA2MiA5LjAxMTcxOSA0Ni42MDU0NjkgOS41NTQ2ODggTCAxNi43Njk1MzEgMjYuODEyNSBDIDE0LjkwMjM0NCAyNy44OTQ1MzEgMTQuOTAyMzQ0IDI5LjYwMTU2MiAxNi43Njk1MzEgMzAuNjgzNTk0IEwgNDYuNjA1NDY5IDQ3Ljk0MTQwNiBDIDQ4LjQ3NjU2MiA0OS4wMjM0MzggNTEuNDI5Njg4IDQ5LjAyMzQzOCA1My4zMDA3ODEgNDcuOTQxNDA2IEwgODMuMTMyODEyIDMwLjY4MzU5NCBDIDg1LjAwMzkwNiAyOS42MDE1NjIgODUuMDAzOTA2IDI3Ljg5NDUzMSA4My4xMzI4MTIgMjYuODEyNSBMIDUzLjMwMDc4MSA5LjU1NDY4OCBDIDUyLjM2MzI4MSA5LjAxMTcxOSA1MS4xNjAxNTYgOC43NDIxODggNDkuOTUzMTI1IDguNzQyMTg4IFogTSA0OS43OTI5NjkgMTkuMTE3MTg4IEMgNTEuNTUwNzgxIDE5LjEzNjcxOSA1My4xMzY3MTkgMTkuNTM5MDYyIDU0LjUzOTA2MiAyMC4zMjQyMTkgQyA1NS41IDIwLjg2MzI4MSA1Ni4xMjg5MDYgMjEuNDc2NTYyIDU2LjQyOTY4OCAyMi4xNjc5NjkgQyA1Ni43MTQ4NDQgMjIuODU1NDY5IDU2LjczNDM3NSAyMy43NTc4MTIgNTYuNDgwNDY5IDI0Ljg3NSBMIDU2LjE2Nzk2OSAyNS45OTIxODggQyA1NS45NjA5MzggMjYuNzg5MDYyIDU1LjkxNzk2OSAyNy4zNjMyODEgNTYuMDM5MDYyIDI3LjcxMDkzOCBDIDU2LjE0ODQzOCAyOC4wNTQ2ODggNTYuNDI1NzgxIDI4LjM1MTU2MiA1Ni44NjcxODggMjguNTk3NjU2IEwgNTcuNTI3MzQ0IDI4Ljk2ODc1IEwgNTEuMDM1MTU2IDMyLjYwNTQ2OSBMIDUwLjMxNjQwNiAzMi4yMDMxMjUgQyA0OS41MTE3MTkgMzEuNzUzOTA2IDQ5IDMxLjI0MjE4OCA0OC43NzczNDQgMzAuNjc1NzgxIEMgNDguNTQyOTY5IDMwLjEwMTU2MiA0OC41ODIwMzEgMjkuMTkxNDA2IDQ4Ljg5MDYyNSAyNy45NDE0MDYgTCA0OS4xOTE0MDYgMjYuODE2NDA2IEMgNDkuMzYzMjgxIDI2LjE0ODQzOCA0OS4zNzg5MDYgMjUuNjAxNTYyIDQ5LjI0MjE4OCAyNS4xNzE4NzUgQyA0OS4xMTMyODEgMjQuNzM4MjgxIDQ4LjgyNDIxOSAyNC4zOTQ1MzEgNDguMzcxMDk0IDI0LjE0NDUzMSBDIDQ3LjY4NzUgMjMuNzU3ODEyIDQ2Ljg2MzI4MSAyMy42MjEwOTQgNDUuOTA2MjUgMjMuNzI2NTYyIEMgNDQuOTM3NSAyMy44MzIwMzEgNDMuOTM3NSAyNC4xNzE4NzUgNDIuOTA2MjUgMjQuNzUgQyA0MS45Mzc1IDI1LjI5Mjk2OSA0MS4wNTQ2ODggMjUuOTcyNjU2IDQwLjI2MTcxOSAyNi43OTI5NjkgQyAzOS40NTcwMzEgMjcuNjA1NDY5IDM4Ljc2OTUzMSAyOC41MzUxNTYgMzguMTkxNDA2IDI5LjU4MjAzMSBMIDMzLjU3NDIxOSAyNi45OTIxODggQyAzNC42MTMyODEgMjUuOTQ5MjE5IDM1LjYzMjgxMiAyNS4wMzkwNjIgMzYuNjM2NzE5IDI0LjI1NzgxMiBDIDM3LjYzNjcxOSAyMy40NzY1NjIgMzguNjk1MzEyIDIyLjc3MzQzOCAzOS44MTI1IDIyLjE0ODQzOCBDIDQyLjczODI4MSAyMC41MDc4MTIgNDUuNDU3MDMxIDE5LjUzNTE1NiA0Ny45NzI2NTYgMTkuMjIyNjU2IEMgNDguNTk3NjU2IDE5LjE0NDUzMSA0OS4yMDcwMzEgMTkuMTA5Mzc1IDQ5Ljc5Mjk2OSAxOS4xMTcxODggWiBNIDU5LjcwNzAzMSAzMC4xOTE0MDYgTCA2NC45NDE0MDYgMzMuMTI1IEwgNTguNDUzMTI1IDM2Ljc2MTcxOSBMIDUzLjIxNDg0NCAzMy44MjgxMjUgWiBNIDE0Ljc3NzM0NCAzMy45NTMxMjUgQyAxMy42NTYyNSAzMy45MjE4NzUgMTIuODkwNjI1IDM0LjgwMDc4MSAxMi44OTA2MjUgMzYuMzUxNTYyIEwgMTIuODkwNjI1IDY3LjE1MjM0NCBDIDEyLjg5MDYyNSA2OS4zMDg1OTQgMTQuMzcxMDk0IDcxLjg3MTA5NCAxNi4yMzgyODEgNzIuOTQ5MjE5IEwgNDQuOTM3NSA4OS41MjM0MzggQyA0Ni44MDQ2ODggOTAuNjAxNTYyIDQ4LjI4NTE1NiA4OS43NSA0OC4yODUxNTYgODcuNTg5ODQ0IEwgNDguMjg1MTU2IDU2Ljc4OTA2MiBDIDQ4LjI4NTE1NiA1NC42Mjg5MDYgNDYuODA0Njg4IDUyLjA3MDMxMiA0NC45Mzc1IDUwLjk5MjE4OCBMIDE2LjIzODI4MSAzNC40MTc5NjkgQyAxNS43MTQ4NDQgMzQuMTE3MTg4IDE1LjIxODc1IDMzLjk2NDg0NCAxNC43ODEyNSAzMy45NTMxMjUgWiBNIDg1LjI0MjE4OCAzMy45NTMxMjUgQyA4NC44MDQ2ODggMzMuOTY0ODQ0IDg0LjMwODU5NCAzNC4xMTcxODggODMuNzgxMjUgMzQuNDE3OTY5IEwgNTUuMDg1OTM4IDUwLjk5MjE4OCBDIDUzLjIxNDg0NCA1Mi4wNzAzMTIgNTEuNzM4MjgxIDU0LjYzMjgxMiA1MS43MzgyODEgNTYuNzg5MDYyIEwgNTEuNzM4MjgxIDg3LjU4OTg0NCBDIDUxLjczODI4MSA4OS43NSA1My4yMTQ4NDQgOTAuNjAxNTYyIDU1LjA4NTkzOCA4OS41MjM0MzggTCA4My43ODEyNSA3Mi45NTMxMjUgQyA4NS42NTIzNDQgNzEuODcxMDk0IDg3LjEyODkwNiA2OS4zMTI1IDg3LjEyODkwNiA2Ny4xNTIzNDQgTCA4Ny4xMjg5MDYgMzYuMzUxNTYyIEMgODcuMTI4OTA2IDM0LjgwMDc4MSA4Ni4zNjcxODggMzMuOTI1NzgxIDg1LjI0MjE4OCAzMy45NTMxMjUgWiBNIDIyLjQ0MTQwNiA0Ni40MDYyNSBDIDIzLjcyMjY1NiA0Ni42NzE4NzUgMjQuODkwNjI1IDQ3IDI1Ljk0OTIxOSA0Ny4zODI4MTIgQyAyNy4wMDM5MDYgNDcuNzY5NTMxIDI4LjAyNzM0NCA0OC4yNDYwOTQgMjkuMDExNzE5IDQ4LjgxNjQwNiBDIDMxLjU4OTg0NCA1MC4zMDQ2ODggMzMuNTU4NTk0IDUyLjAwMzkwNiAzNC45MTAxNTYgNTMuOTEwMTU2IEMgMzYuMjY1NjI1IDU1LjgwNDY4OCAzNi45NDE0MDYgNTcuODI0MjE5IDM2Ljk0MTQwNiA1OS45NzI2NTYgQyAzNi45NDE0MDYgNjEuMDc0MjE5IDM2LjczODI4MSA2MS45NDE0MDYgMzYuMzI0MjE5IDYyLjU4MjAzMSBDIDM1LjkxMDE1NiA2My4yMTA5MzggMzUuMjA3MDMxIDYzLjczNDM3NSAzNC4yMTQ4NDQgNjQuMTY0MDYyIEwgMzMuMTk5MjE5IDY0LjUzOTA2MiBDIDMyLjQ4MDQ2OSA2NC44MjAzMTIgMzIuMDA3ODEyIDY1LjEwOTM3NSAzMS43ODUxNTYgNjUuNDEwMTU2IEMgMzEuNTYyNSA2NS42OTUzMTIgMzEuNDUzMTI1IDY2LjA5Mzc1IDMxLjQ1MzEyNSA2Ni41OTc2NTYgTCAzMS40NTMxMjUgNjcuMzU1NDY5IEwgMjUuNzI2NTYyIDY0LjA1MDc4MSBMIDI1LjcyNjU2MiA2My4yMjI2NTYgQyAyNS43MjY1NjIgNjIuMzAwNzgxIDI1Ljg5ODQzOCA2MS41ODU5MzggMjYuMjUgNjEuMDgyMDMxIEMgMjYuNTk3NjU2IDYwLjU2MjUgMjcuMzMyMDMxIDYwLjA3ODEyNSAyOC40NTMxMjUgNTkuNjIxMDk0IEwgMjkuNDY4NzUgNTkuMjMwNDY5IEMgMzAuMDc0MjE5IDU4Ljk5NjA5NCAzMC41MTE3MTkgNTguNjk5MjE5IDMwLjc4NTE1NiA1OC4zMzk4NDQgQyAzMS4wNzAzMTIgNTcuOTg4MjgxIDMxLjIxNDg0NCA1Ny41NTA3ODEgMzEuMjE0ODQ0IDU3LjAzNTE1NiBDIDMxLjIxNDg0NCA1Ni4yNSAzMC45NjA5MzggNTUuNDg4MjgxIDMwLjQ1MzEyNSA1NC43NTc4MTIgQyAyOS45NDUzMTIgNTQuMDE1NjI1IDI5LjIzODI4MSA1My4zNzg5MDYgMjguMzI4MTI1IDUyLjg1NTQ2OSBDIDI3LjQ2ODc1IDUyLjM1OTM3NSAyNi41NDY4NzUgNTIuMDE1NjI1IDI1LjU1MDc4MSA1MS44MjQyMTkgQyAyNC41NTQ2ODggNTEuNjIxMDk0IDIzLjUxOTUzMSA1MS41ODIwMzEgMjIuNDQxNDA2IDUxLjY5OTIxOSBaIE0gNzUuMDg1OTM4IDQ4LjA4NTkzOCBDIDc1LjM4MjgxMiA0OC4wODU5MzggNzUuNjU2MjUgNDguMTE3MTg4IDc1LjkxNDA2MiA0OC4xODM1OTQgQyA3Ny4yNjU2MjUgNDguNTE1NjI1IDc3Ljk0MTQwNiA0OS43NTM5MDYgNzcuOTQxNDA2IDUxLjg5ODQzOCBDIDc3Ljk0MTQwNiA1MyA3Ny43MzgyODEgNTQuMTA5Mzc1IDc3LjMyNDIxOSA1NS4yMjY1NjIgQyA3Ni45MTAxNTYgNTYuMzI4MTI1IDc2LjIwNzAzMSA1Ny42Njc5NjkgNzUuMjE0ODQ0IDU5LjI0MjE4OCBMIDc0LjE5OTIxOSA2MC43ODkwNjIgQyA3My40ODA0NjkgNjEuOTAyMzQ0IDczLjAwNzgxMiA2Mi43MzQzNzUgNzIuNzg1MTU2IDYzLjI4OTA2MiBDIDcyLjU2MjUgNjMuODM1OTM4IDcyLjQ1MzEyNSA2NC4zNTkzNzUgNzIuNDUzMTI1IDY0Ljg2NzE4OCBMIDcyLjQ1MzEyNSA2NS42MjUgTCA2Ni43MjY1NjIgNjguOTI5Njg4IEwgNjYuNzI2NTYyIDY4LjEwNTQ2OSBDIDY2LjcyNjU2MiA2Ny4xODM1OTQgNjYuOTAyMzQ0IDY2LjI2NTYyNSA2Ny4yNSA2NS4zNTkzNzUgQyA2Ny41OTc2NTYgNjQuNDM3NSA2OC4zMzIwMzEgNjMuMTAxNTYyIDY5LjQ1MzEyNSA2MS4zNTE1NjIgTCA3MC40Njg3NSA1OS43ODkwNjIgQyA3MS4wNzQyMTkgNTguODU1NDY5IDcxLjUxMTcxOSA1OC4wNTA3ODEgNzEuNzg5MDYyIDU3LjM3NSBDIDcyLjA3NDIxOSA1Ni42OTUzMTIgNzIuMjE0ODQ0IDU2LjA5Mzc1IDcyLjIxNDg0NCA1NS41NzgxMjUgQyA3Mi4yMTQ4NDQgNTQuNzg5MDYyIDcxLjk2MDkzOCA1NC4zMjQyMTkgNzEuNDUzMTI1IDU0LjE3OTY4OCBDIDcwLjk0NTMxMiA1NC4wMjM0MzggNzAuMjM4MjgxIDU0LjIwNzAzMSA2OS4zMjgxMjUgNTQuNzMwNDY5IEMgNjguNDcyNjU2IDU1LjIyNjU2MiA2Ny41NDY4NzUgNTUuOTUzMTI1IDY2LjU1MDc4MSA1Ni45MTAxNTYgQyA2NS41NTg1OTQgNTcuODU1NDY5IDY0LjUxOTUzMSA1OS4wMDc4MTIgNjMuNDQxNDA2IDYwLjM3NSBMIDYzLjQ0MTQwNiA1NS4wNzgxMjUgQyA2NC43MjI2NTYgNTMuODY3MTg4IDY1Ljg5MDYyNSA1Mi44NDM3NSA2Ni45NDkyMTkgNTIuMDA3ODEyIEMgNjguMDAzOTA2IDUxLjE3MTg3NSA2OS4wMjczNDQgNTAuNDcyNjU2IDcwLjAxMTcxOSA0OS45MDIzNDQgQyA3Mi4xMDU0NjkgNDguNjkxNDA2IDczLjc5Njg3NSA0OC4wODU5MzggNzUuMDg1OTM4IDQ4LjA4NTkzOCBaIE0gMjUuNzI2NTYyIDY2LjU0Njg3NSBMIDMxLjQ1MzEyNSA2OS44NTE1NjIgTCAzMS40NTMxMjUgNzUuODU1NDY5IEwgMjUuNzI2NTYyIDcyLjU1MDc4MSBaIE0gNzIuNDUzMTI1IDY4LjEyMTA5NCBMIDcyLjQ1MzEyNSA3NC4xMjUgTCA2Ni43MjY1NjIgNzcuNDI5Njg4IEwgNjYuNzI2NTYyIDcxLjQyNTc4MSBaIE0gNzIuNDUzMTI1IDY4LjEyMTA5NCAiLz4KPC9nPgo8L3N2Zz4K">
                        </span>
                    </div>
                    <div 
                        class="casino-set casino-provider blue" 
                        style="width: 150px;user-select: none" 
                        v-on-clickaway="closeProviders"
                        @click="providers.status = !providers.status"
                    >
                        <span>Все провайдеры</span>
                    </div>
                    <div id="dropdown" class="dropdown__inner" v-if="providers.status">
                        <ul>
                            <li v-for="(item, index) in providers.items" 
                                @click="
                                    providers.current = item.provider
                                    providers.status = false
                                    slots = []
                                "
                            >
                             {{ item.name }}
                                <span style="margin-left: auto;">{{ item.games }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="game_list">
                <div class="search_empty" v-if="!slots.length && !loading">
                    Игры не найдены
                </div>
                <div class="lds-ellipsis" v-if="loading">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="game_" v-for="slot in this.slots" :key="slot.id" v-else>
                    <router-link :to="'/slots/game/' + slot.game_id" class="">
                        <div class="game_image">
                            <div class="vue-load-image" :src="'/assets/image/slots/'+ slot.title.split(' ').join('') + '.jpg'" center-type="cover">
                                <img :src="'/assets/image/slots/'+ slot.title.split(' ').join('') + '.jpg'">
                            </div>
                        </div>
                        <div class="info">
                            <div class="title">{{ slot.title }}</div>
                            <div class="go"></div>
                            <router-link :to="'/slots/game/' + slot.game_id + '/demo'" class>
                                <div class="title2">DEMO</div>
                            </router-link>
                            <div class="title3">{{ slot.provider }}</div>
                        </div>
                    </router-link>
                </div>
                <div v-observe-visibility="handleInfinityScroll"/>
            </div>
            <br><br>
        </div>
    </div>
    </template>
    
    <script>
    import axios from 'axios'
    
    export default {
        data() {
            return {
                page: 1,
                last_page: null,
                provider: 'list',
                search: '',
                timeout: null,
                slots: [],
                history: [],
                per_page: 36,
                observe: null,
                loading: true,
                providers: {
                    status: false,
                    current: 'all',
                    items: [],
                },
                type: 'real'
            }
        },
        mounted() {
            this.getSlots(this.page);
            this.getCount();
            this.$socket.emit('getHistory');
        },
        methods: {
            randomSlot() {
                axios.post('/slots/getRandom').then((res) => {
                    if(res.data.error) {
                        n(res.data.msg, 'error');
                        return this.$router.push('/slots')
                    }
                    this.$router.push('/slots/game/'+ res.data.id);
                    this.getSlot(res.data.id);
                })
            },
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
            getSlots() {
                axios.post(`/slots/get?provider=${this.providers.current}&page=${this.page}&count=${this.per_page}` + (this.search != '' ? '&search='+ this.search : '')).then((res) => {
                    this.slots = [...this.slots, ...Object.values(res.data.data)]
                    this.last_page = res.data.last_page
                    this.loading = false
                });
            },
            getCount() {
                axios.post('/slots/count').then((res) => {
                    this.providers.items = res.data;
                })
            },
            setProvider(name) {
                this.provider = name;
                axios.post(`/slots/${this.provider}`).then((res) => {
                    this.slots = res.data;
                    this.last_page = res.data.last_page;
                });
            },
            normalPaginate(e) {
                if (e == "&laquo; Previous") return "«";
                if (e == "Next &raquo;") return "»";
                return e;
            },
            linkGen() {
    
            },
            closeProviders() {
                this.providers.status = false
            },
            handleInfinityScroll(isVisible) {
                if (!isVisible) {
                    return;
                }
    
                if(this.page >= this.last_page && this.page !== 0) {
                    return;
                }
    
    
                this.page += 1;
                this.getSlots()
            }
        },
        sockets: {
            getHistory(data) {
                this.history = data;
            },
    
            slotsHistory(data) {
                this.history.unshift(data);
    
                if(this.history.length > 7) this.history.pop();
            }
        },
        watch: {
            search() {
                clearTimeout(this.timeout)
                this.timeout = setTimeout(() => {
                    this.loading = true
                    this.page = 1
                    this.slots = []
                    this.getSlots()
                }, 450)
            },
            'providers.current'() {
                this.loading = true
                this.page = 1
                this.last_page = 1
                this.slots = []
                this.getSlots()
            }
        }
    }
    </script>
    
    <style>
    .pagination {
        justify-content: center!important;
    }
    .slots_p {
        text-align: center;
    }
    
    .casino-set {
        align-items: center;
        background-image: linear-gradient(45deg,#ac64d3,#5b1eff);
        border-radius: 5px;
        cursor: pointer;
        display: inline-block;
        justify-content: center;
        margin: 5px;
        min-width: 36px;
        padding: 4px;
        text-align: center;
        transition: all .2s ease-out;
        width: 90px;
    }
    
    .casino-provider>span {
        color: #fff;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 2px;
    }
    
    a {
        color: #fff;
    }
    
    .game_:hover .info {
        opacity: 1;
        pointer-events: all;
    }
    .slots_p .info .title {
        font-size: .875rem;
        line-height: 1rem;
        padding-bottom: 20px;
        padding-top: 25px;
        width: 90%;
    }
    
    .slots_p .info .title, .info .title2 {
        color: #fff;
        display: flex;
        font-weight: 700;
        height: 30px;
        justify-content: center;
        margin: 0 auto;
        text-align: center;
        z-index: 1;
    }
    .go {
        background-image: url(/assets/image/button__play.svg?v=2);
        background-repeat: no-repeat;
        background-size: 100%;
        height: 42px;
        margin: 0 auto;
        opacity: .95;
        width: 42px;
        z-index: 1;
    }
    .slots_p .info .title2 {
        border: 2px solid rgb(255 255 255/50%);
        border-radius: 8px;
        flex-direction: column;
        font-size: .677rem;
        opacity: .95;
        transition: all .2s ease-out;
        width: 40%;
    }
    .slots_p .info .title2:hover {
        background: rgb(255 255 255/20%);
        color: linear-gradient(45deg,#ac64d3,#5b1eff);
    }
    .info .title3 {
        color: #fff;
        font-size: 8px;
        font-weight: 500;
        letter-spacing: .14em;
        line-height: 100%;
        padding-bottom: 5px;
        text-transform: uppercase;
        z-index: 1;
    }
    .slots_p .info {
        opacity: 0;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        flex-direction: column;
        display: flex;
        justify-content: space-between;
        padding: var(--spacing-1);
        pointer-events: none;
        transition: 0.4s;
    }
    
    .slots_p .info:before {
        background-color: rgba(32,43,77,.9);
        content: "";
        height: 100%;
        left: 0;
        opacity: .85;
        position: absolute;
        top: 0;
        width: 100%;
    }
    
    .game_ .game_image {
        height: 207px;
        width: 140px;
    }
    
    .game_ .game_image img {
        height: 207px;
        width: 140px;
    }
    .vue-load-image {
        background-color: initial;
        display: inline-block;
        height: 207px;
        overflow: hidden;
        position: relative;
        width: 140px;
    }
    .slots_p .info, .vue-load-image img {
        left: 0;
        position: absolute;
        top: 0;
    }
    .game_ {
        margin: 5px;
        border: 0;
        cursor: pointer;
        border-radius: 0.5rem;
        width: 140px;
        height: 187px;
        transition: 400ms ease;
        overflow: hidden;
        position: relative;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 5px 10px 2px rgb(8 10 12/5%);
    }
    
    .provider_container {
        align-items: center;
        background: linear-gradient(180deg,rgba(3,25,58,0),#0a0a0a);
        bottom: 0;
        display: flex;
        justify-content: center;
        left: 0;
        opacity: 1;
        padding: 5px 0;
        position: absolute;
        right: 0;
        z-index: 1;
    }
    .small_provider {
        font-size: 8px;
        letter-spacing: .14em;
        line-height: 100%;
        margin-bottom: 0;
        text-transform: uppercase;
    }
    .provider_container2 {
        color: #fff;
        opacity: 1;
    }
    .game_:hover {
        transform: scale(1.05);
    }
    
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-image: linear-gradient(45deg,#ac64d3,#5b1eff);
        border-color: linear-gradient(45deg,#ac64d3,#5b1eff);
    }
    
    .page-link {
        position: relative;
        display: block;
        color: linear-gradient(45deg,#ac64d3,#5b1eff);
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    
    .page-link:hover {
        z-index: 2;
        color: linear-gradient(45deg,#ac64d3,#5b1eff);
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
    
    .s1 {
        position: relative;
    }
    
    .s2 {
        overflow: auto;
        padding: 0 10px 5px;
        width: 100%;
    }
    
    .s3 {
        justify-content: space-between;
        position: relative;
        width: 100%;
    }
    
    .live_, .s3 {
        align-items: center;
        display: flex;
    }
    
    .live_ {
        background: #fff;
        color: #000000;
        border-radius: 10px;
        box-shadow: 0 0 5px 0 #dce0ed;
        height: 74px;
        margin: 0 8px;
        padding-right: 8px;
    }
    
    .live_>div:first-child {
        display: flex;
        flex-shrink: 0;
        height: 100%;
        padding: 0;
        width: 50px;
    }
    
    .live_>div:first-child>img {
        border-radius: 6px;
        display: block;
        height: 100%;
        width: 100%;
    }
    
    .live {
        display: flex;
        flex-flow: column nowrap;
        height: 100%;
        justify-content: space-between;
        padding: 3px 0 6px 6px;
        width: 73px;
    }
    
    .live .slotname {
        color: #000000 !important;
    }
    
    .live .slotname, .live .username {
        display: inline-block;
        font-weight: 500;
        overflow: hidden;
        text-align: left;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .live .slotname {
        color: #000000;
        font-size: 10px;
    }
    
    .live .username {
        color: #ddd !important;
    }
    
    .live .username {
        color: grey;
        font-size: 12px;
        padding: 2px 0;
    }
    
    .live .coef {
        color: #000000;
        display: inline-block;
        font-size: 13px;
        padding: 2px 0;
        text-align: left;
        white-space: nowrap;
    }
    
    .live .coef, .live .number {
        font-weight: 600;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .live .number {
        align-items: center;
        color: #28a745!important;
        display: inline-flex;
        font-size: 15px;
        padding-top: 4px;
    }
    
    .slots_box {
        display: inline-flex;
        padding: 10px 35px 10px 30px;
        width: 100%;
    }
    
    .search_ {
        margin-right: 5px;
        width: 100%;
    }
    
    .search_:before {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAHxqAAB8agGqO5LeAAAE7WlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNi4wLWMwMDIgNzkuMTY0NDg4LCAyMDIwLzA3LzEwLTIyOjA2OjUzICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjIuMCAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIzLTA0LTA2VDIxOjI3OjMxKzAzOjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMy0wNC0wNlQyMTozNToxMyswMzowMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAyMy0wNC0wNlQyMTozNToxMyswMzowMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MDg5NDM0YWYtYmI4ZS00MDQ2LWEwNzQtY2E4ZjU1MmVmOTk5IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjA4OTQzNGFmLWJiOGUtNDA0Ni1hMDc0LWNhOGY1NTJlZjk5OSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjA4OTQzNGFmLWJiOGUtNDA0Ni1hMDc0LWNhOGY1NTJlZjk5OSI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249ImNyZWF0ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MDg5NDM0YWYtYmI4ZS00MDQ2LWEwNzQtY2E4ZjU1MmVmOTk5IiBzdEV2dDp3aGVuPSIyMDIzLTA0LTA2VDIxOjI3OjMxKzAzOjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjIuMCAoV2luZG93cykiLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+h8ZO7wAAA6JJREFUaIHVmV1IFUEYhh/XwlRKsT9LwwKVoCjIEhK9iMjACKIugqAoiagugopuCgwFkSCwIgqSbrqIiiDrqj+irCAthIiK8AeFjAzTzP4I83Qx53D0OLOzuzPnnHpgbnZ23u/9zp6dnfkmBTMWA1VACbAIyAOyAQcYAfqAHuA1cBtoBUKGMa0xDTgAvEOY8tP6gQZgdsJdx1APjOE/AVm7BGQl1j6sBgYMjavazkQlcTxOCYxv101Npmj6LwLVmntGgedAC9CFeMlDQCawACgHyoAMjU4b4smPae7zzTXcf8VeRJLpHvWqiM5aqtZuz77ghEuwP8B+A+31wGcX/WYD7QlsdgnSDsy0FOeGS5xaU/EMxFwvE79nKi6hURErBKw0ET6pEG01EdVwQRHzUVDBeYgZKFbwe7gvnrRJ4oYQE4RvGhRiu2w41bBcEftuELEeidALGy49ovqLFfsRqVCI7LDpVMNShYfDfkTqJAIfgFSbTj3QIvFx08tAB1gILJP0PUR8/BLJHcm1Ui8DHWAJ4rHG8tTEUUBk72QuUKAbGHkieZK+TjNPgXiruK5dTTjAHMSuL5ZBE0cBGQZ+SK7P0A10UC/lrS+nPRDZfcai227gAN8UfZkmjgKSjnxbIHtKE3CA98AnSV+uoakgzEd4iuWLbqCDqIbIXuxVZp4CsUJy7RfwUTfQAToQdadYygxNBaFccu0lYhLwxHbky4MSG+48koa8UnPGj0i+RCAEnLPpVEO1wkOlX6FbCqEiW041dEhi9wYR2igRCiH21vGmRhG7Lqigqlxz0NSpC2sUMUeAnKCilQrRELDJyK6cQsT0Kot31FS8SSFse9tbgbogbqVQl4oofaqSOW8hxhEX/T7EGYsVioGfLsEGgX0BdDegP1d5Zuh9EqXoz0IGgbPAOmAuk1epOYivdS3QrdEa3x7bTqYIf+cifYhdXlvYuKxO5rXJtr1GpAEPDAzp2gDwW9HnqfDgl21Ezz5stWNh7VMu91yJRzJTEPP7kIH5UcTMF/uxu+wypikeyYB4qbeEA3R6MN8PXAX2ANNddJtdNE7rDNmggOg5e6TiMUz0nL0b7zWA+8BaRV8jcCiwyyQgqzhGWn0SfQXiCepkapLoyzcpiG+SKhlfxe1kMxV4gzqZvcmz5p8s5Gc3kbY1ac4CMAtxzCFLZAjYLSuG/YsMIMpTXyV92YgN2n9FPmLFPf6JdBGf3WvcKQReIZLoIVyd/AvlAEtjj4f/kQAAAABJRU5ErkJggg==);
        background-repeat: no-repeat;
        background-size: 16px 16px;
        content: "";
        height: 16px;
        position: absolute;
        transform: translateY(78%) translatex(50%);
        width: 16px;
    }
    
    .search_ input {
        color: #000000!important;
        background-color: #fff!important;
        border: 2px solid #5b1eff!important;
    }
    
    .search_ input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background: #fff;
        border: 2px solid rgb(33 85 237/20%);
        border-radius: 6px;
        color: #333;
        font-size: 16px;
        font-weight: 400;
        height: 33px;
        margin-top: 5px;
        padding-left: 35px;
        width: 100%;
    }
    
    [type=search] {
        -webkit-appearance: none;
        outline-offset: -2px;
    }
    
    .b1_ {
        display: flex;
    }
    
    .providers {
        margin-right: 8px;
        width: 16px;
    }
    
    .b1_ .dropdown__inner {
        background-color: #f1f2fd;
        border-radius: 10px;
        box-shadow: 5px 10px 15px rgb(0 0 0/10%);
        color: #333;
        display: block;
        margin-bottom: 0!important;
        margin-top: 2%;
        padding: 5px 5px 0 0;
        position: absolute;
        width: 240px;
        width: 190px;
        z-index: 4;
    }
    
    .b1_ .dropdown__inner ul {
        -webkit-padding-start: 10px;
        -webkit-margin-before: 0;
        -webkit-margin-after: 0;
        margin-block-end: 0;
        margin-block-start: 0;
        max-height: 280px!important;
        overflow-y: auto;
        overscroll-behavior-y: contain;
        padding-right: 10px;
        padding-inline-start: 10px;
        position: relative;
        scrollbar-color: #333;
        scrollbar-width: thin;
    }
    
    .b1_ .dropdown__inner ul li {
        align-items: center;
        border-left: 4px solid transparent;
        color: #333;
        cursor: pointer;
        display: flex;
        font-size: 14px;
        font-weight: 500;
        line-height: 32px;
        overflow-x: hidden;
        text-overflow: ellipsis;
        transition: all .2s ease-in-out;
        white-space: nowrap;
    }
    
    .b1_ .dropdown__inner ul li span {
        color: #5b1eff;
    }
    
    .game_list {
        text-align: center;
    }
    
    .casino-icons {
        width: 30px;
    }
    
    @media (max-width: 992px) {
        .slots_box {
            display: block;
            padding: 10px!important;
        }
    
        .b1_ {
            display: block!important;
            padding-top: 5px;
        }
    
        .b1_ .dropdown__inner {
            right: 13px;
        }
    }
    
    .search_empty {
        margin-top: 1em;
        text-align: center;
    }
    
    .lds-ellipsis {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }
    .lds-ellipsis div {
      position: absolute;
      top: 33px;
      width: 13px;
      height: 13px;
      border-radius: 50%;
      background-image: linear-gradient(45deg,#ac64d3,#5b1eff);
      animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
      left: 8px;
      animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
      left: 8px;
      animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
      left: 32px;
      animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
      left: 56px;
      animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
      0% {
        transform: scale(0);
      }
      100% {
        transform: scale(1);
      }
    }
    @keyframes lds-ellipsis3 {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(0);
      }
    }
    @keyframes lds-ellipsis2 {
      0% {
        transform: translate(0, 0);
      }
      100% {
        transform: translate(24px, 0);
      }
    }
    </style>