import Vue from 'vue';
import VueRouter from 'vue-router';

import ViewHome from '../views/Home';
import ViewPreparation from '../views/FightersSelection';
import ViewFight from '../views/Fight';
import ViewFightResult from '../views/FightResult';

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            name: 'home',
            path: '/',
            component: ViewHome
        },
        {
            name: 'fightersSelection',
            path: '/preparation',
            component: ViewPreparation
        },
        {
            name: 'fight',
            path: '/fight/:firstHeroId/:secondHeroId',
            component: ViewFight
        },
        {
            name: 'fightResult',
            path: '/result',
            component: ViewFightResult
        }
    ]
})