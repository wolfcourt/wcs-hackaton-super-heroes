<template>
    <div id="app" class="game-container">
        <!-- Overlay 
        <div class="overlay">
            <p>
                <span>Preparation time</span><br/>
                <strong>PLAYER 2</strong>
            </p>
        </div>-->

        <!-- Memo -->
        <div class="fixed-title mbs-2">
            <router-link to="/">
                <b>Super Heroes Fighter Club</b> - Alpha 1.0.8
            </router-link>
        </div>
    
        <!-- Router view -->
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'app'
}
</script>