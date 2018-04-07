<template>
    <div id="game-selection">
        <div class="search-box">
            <input v-model="searchName" type="text" placeholder="Search an hero by his name..."/>
            <p><b>{{ heroesList.length }}</b> heroes available and <b>{{ filteredHeroes.length }}</b> displayed.</p>
        </div>
        <div class="selection" v-bind:class="{ 'player-one': currentSelector === 0, 'player-two': currentSelector === 1 }">
            <div
            class="custom-card mbs-1"
            v-for="hero in filteredHeroes"
            v-bind:key="hero.id"
            v-bind:style="{ 'background-image': 'url('+ hero.image +')' }"
            v-bind:class="{ 'player-one-selected': selections[0] === hero.id, 'player-two-selected': selections[1] === hero.id }"
            @click="selectHero(hero.id)"
            v-cloak
            >
                <div class="custom-card-content">
                    <b>{{ hero.name }}</b>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'fightersSelection',
    data: () => {
        return {
            heroesList: [],
            currentSelector: 0,
            selections: [],
            searchName: null,
            limit: 30
        }
    },
    computed: {
        filteredHeroes: function() {
            if(this.searchName === null || this.searchName.length < 3)
                return this.heroesList.slice(0, this.limit);
            return this.heroesList.filter(hero => hero.name.toLowerCase().includes(this.searchName.toLowerCase()));
        }
    },
    methods: {
        selectHero: function(characterId) {
            this.currentSelector++;
            this.selections.push(characterId);
            if(this.selections.length === 2){
                this.$router.push('/fight/' + this.selections.join('/'));
                return null;
            }
        }
    },
    created: function() {
        console.log('Request to characters list.');
        axios.get('http://localhost:8000/data/heroes-list.php')
        .then(({ data }) => {
            console.log(data);
            this.heroesList = data;
        })
        .catch(console.error);
    }
}
</script>