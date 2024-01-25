<template>
    <div class="container mt-5 rows footers">
        <div class="col-md-auto item" @click="$root.$emit('open', 'terms')">Пользовательское соглашение</div>
        <div class="col-md-auto item" @click="$root.$emit('open', 'policy')">Политика конфиденциальности</div>
        <div class="col-md-auto ml-auto">Всегда актуальное зеркало 一 <a href="https://lucker.fun/">lucker.fun</a></div>
    </div>
</template>

<style scoped>

</style>
