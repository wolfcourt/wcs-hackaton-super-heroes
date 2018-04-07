<template>
    <div class="fight-container">
        <!-- Audio -->
        <audio autoplay loop>
            <source src="/static/sounds/pokemon.mp3" type="audio/mpeg">
        </audio>

        <!-- First hero -->
        <div class="fight-column">
            <h1 class="fighter-name">{{ firstHero.name }}</h1>
            <div class="fighter-card player-one mbs-2" v-bind:style="{'background-image': 'url('+ firstHero.image +')'}">
                <p>
                    <small>Player 1</small><br/>
                    <b>Red</b>
                </p>
            </div>
            <!-- Life points -->
            <div class="health-bar player-one">
                <div class="life-points" v-bind:style="{ 'width': firstHeroLife + '%' }"></div>
            </div>
        </div>

        <!-- Versus -->
        <div class="fight-column fight-versus">
            <img src="/static/img/versus.png" alt="Versus"/>
        </div>
        
        <!-- Second hero -->
        <div class="fight-column">
            <h1 class="fighter-name">{{ secondHero.name }}</h1>
            <div class="fighter-card player-two mbs-2" v-bind:style="{'background-image': 'url('+ secondHero.image +')'}">
                <p>
                    <small>Player 2</small><br/>
                    <b>Blue</b>
                </p>
            </div>
            
            <!-- Life points -->
            <div class="health-bar player-two">
                <div class="life-points" v-bind:style="{ 'width': secondHeroLife + '%' }"></div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'fight',
    data: () => {
        return {
            firstHero: { id: null },
            firstHeroLife: 100,
            secondHero: { id: null },
            secondHeroLife: 100,
            lifePercentage: 100
        }
    },
    methods: {
        updateLifeBars: function(firstLife, secondLife, time = 0, callback = () => {}) {
            setTimeout(() => {
                this.firstHeroLife = Math.max(0, firstLife);
                this.secondHeroLife = Math.max(0, secondLife);
                callback();
            }, time)
        }
    },
    created: function() {
        const { firstHeroId, secondHeroId } = this.$router.history.current.params;
        this.firstHero.id = firstHeroId;
        this.secondHero.id = secondHeroId;

        console.log('Request to fighters data.', firstHeroId, secondHeroId);
        axios.get('http://localhost:8000/data/fighters.php?ids=' + JSON.stringify([firstHeroId, secondHeroId]))
        .then(({ data }) => {
            console.log(data);
            this.firstHero = data[firstHeroId];
            this.secondHero = data[secondHeroId];
        })
        .catch(console.error);

        axios.get('http://localhost:8000/data/fight.php?playerOneId=' + firstHeroId + '&playerTwoId=' + secondHeroId)
        .then(({ data }) => {
            console.log(data);
            sessionStorage.setItem('result', JSON.stringify(data));
            for (let turnId in data.turns) {
                const turn = data.turns[turnId];
                this.updateLifeBars(turn.playerOne.life, turn.playerTwo.life, 1000 * turnId, () => {
                    if(turnId == data.turns.length - 1)
                        setTimeout(() => this.$router.push('/result'), 2000);
                });
            }
        })
    }
}
</script>