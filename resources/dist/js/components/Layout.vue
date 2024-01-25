<template>
    <div class="main rows">
        <LeftMenu :page="page"/>
        <RingLoader v-if="$root.isLoading"/>
        <div class="right-main">
            <Header :page="page"/>
            <div class="glavpanel container mt-5">
                <router-view></router-view>
                <History
                    v-if="['dice', 'mines', 'bubbles', 'wheel', 'allin', 'main'].indexOf(page) !== -1"
                    :games="$root.games"
                />
            </div>
            <Footer/>
            <notifications position="bottom right"/>
        </div>
    </div>
</template>
<script>
import Header from "./Header";
import LeftMenu from "./LeftMenu";
import Footer from "./Footer";
import History from "./History";
import RingLoader from "./ui/loader/Ring";

export default {
    components: {
        LeftMenu,
        Header,
        Footer,
        History,
        RingLoader
    },
    data() {
        return {
            page: null,
            darkTheme: false
        }
    },
    beforeMount() {
        this.page = this.$router.currentRoute.name;
    },
    beforeUpdate() {
        this.page = this.$router.currentRoute.name;
    },
    mounted() {
        this.$root.$on('open', this.openPage)
        this.$root.$on('noty', ({ title, text, type }) => {
            this.$notify({title, text, type});
        })
    },
    methods: {
        openPage(name) {
            this.$router.push({name}).catch(err => {})
        }
    }
}
</script>

<style>

</style>
