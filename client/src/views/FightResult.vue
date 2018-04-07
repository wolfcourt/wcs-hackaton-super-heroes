<template>
    <div>
        <audio autoplay loop>
            <source src="/static/sounds/pokemon_victory.mp3" type="audio/mpeg">
        </audio>
        <h1>Battle history</h1>
        <div v-for="turn in lastResult.turns" :key="turn">
            <div>The <b>player #1</b> inflicted <b>{{ turn.playerOne.damage }}</b> damages and have <b>{{ turn.playerOne.life }}</b> life points.</div>
            <div>The <b>player #2</b> inflicted <b>{{ turn.playerTwo.damage }}</b> damages and have <b>{{ turn.playerTwo.life }}</b> life points.</div>
        </div>
        <router-link to="preparation" class="btn-fight">Retry</router-link>
    </div>
</template>

<script>
export default {
    name: 'fightResult',
    computed: {
        lastResult: function() {
            return JSON.parse(sessionStorage.getItem('result'));
        }
    }
}
</script>