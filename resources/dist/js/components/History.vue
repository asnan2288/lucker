<template>
    <div class="container mt-5">
        <h2 style="color: #2c4a71;" class="Header-text">
            <svg width="48px" height="48px" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)" style="position: relative;bottom: 3px;">

            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>

            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>

            <g id="SVGRepo_iconCarrier"> <path d="M22 12C22 14.7578 20.8836 17.2549 19.0782 19.064M2 12C2 9.235 3.12222 6.73208 4.93603 4.92188M19.1414 5.00003C19.987 5.86254 20.6775 6.87757 21.1679 8.00003M5 19.1415C4.08988 18.2493 3.34958 17.1845 2.83209 16" stroke="#5997FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16.2849 8.04397C17.3458 9.05877 18 10.4488 18 11.9822C18 13.5338 17.3302 14.9386 16.2469 15.9564M7.8 16C6.68918 14.9789 6 13.556 6 11.9822C6 10.4266 6.67333 9.01843 7.76162 8" stroke="#5997FE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M13.6563 10.4511C14.5521 11.1088 15 11.4376 15 12C15 12.5624 14.5521 12.8912 13.6563 13.5489C13.4091 13.7304 13.1638 13.9014 12.9384 14.0438C12.7407 14.1688 12.5168 14.298 12.2849 14.4249C11.3913 14.914 10.9444 15.1586 10.5437 14.8878C10.1429 14.617 10.1065 14.0502 10.0337 12.9166C10.0131 12.596 10 12.2817 10 12C10 11.7183 10.0131 11.404 10.0337 11.0834C10.1065 9.94977 10.1429 9.38296 10.5437 9.1122C10.9444 8.84144 11.3913 9.08599 12.2849 9.57509C12.5168 9.70198 12.7407 9.83123 12.9384 9.95619C13.1638 10.0986 13.4091 10.2696 13.6563 10.4511Z" stroke="#5997FE" stroke-width="1.5"></path> </g>

        </svg>
            Прошедшие игры
        </h2>
        <div class="history lives-games cards" style="background-color: transparent!important;min-height:910px">
            <table>
                <thead style="background: #d2e0fa;border:0;">
                    <tr>
                        <th>Игра</th>
                        <th>Игрок</th>
                        <th>Ставка</th>
                        <th>Коэффициент</th>
                        <th>Результат</th>
                    </tr>
                </thead>
                <tbody style="position: relative; top: 20px;">
                    <tr v-for="(game, index) in games" :key="index">
                        <td><span class="gm" :class="game.type[0]"></span></td>
                        <td class="username">{{ game.username }}</td>
                        <td class="bet">{{ parseFloat(game.amount).toFixed(2) }}</td>
                        <td class="x">{{ parseFloat(game.coeff).toFixed(2) }}</td>
                        <td class="text-success">{{ parseFloat(game.result).toFixed(2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: ['games'],
    sockets: {
        newGame(data) {
            if(this.games.length >= 14) {
                this.games.pop()
            }
            this.games.unshift(data)
        },
    }
}
</script>

<style scoped>
.bet, .text-success {
    letter-spacing: 0.4px !important;
    font-weight: 500
}
.container {
    margin-top: 2rem !important;
    padding: 0;
}
.gm.d {
    background-image: url('https://luc1.fun/assets/image/dice.png?v=20');
}
.gm.m {
    background-image: url('https://luc1.fun/assets/image/mines.png?v=20');
}
.gm.b {
    background-image: url('https://luc1.fun/assets/image/bubbles.png?v=20');
}
.gm.w {
    background-image: url('https://luc1.fun/assets/image/wheel_hd.png?v=20');
}
.gm.a {
    background-image: url('https://luc1.fun/assets/image/allin.png?v=20');
    width: 39px;
}
.gm {
    background-size: cover;
    display: inline-block;
    height: 20px;
    width: 20px;
}
td.x {
    max-width: 170px;
    width: 170px;
}
td.username, td.x {
    overflow: hidden;
    text-align: center;
    text-overflow: ellipsis;
    white-space: nowrap;
}

td.username {
    max-width: 300px;
    width: 300px;
    font-weight: 500
}
</style>
