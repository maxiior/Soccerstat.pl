<template>
    <div id="matchs">
        <div class="wider-list">
            <div class="list">
                <a href="#">
                    <div v-for="m in mecze" v-bind:key="m.id" class="match">
                        <img v-if="m.league === 'LaLiga'" :src="require('../../hiszpania.jpeg')">
                        <img v-else-if="m.league === 'Bundesliga'" :src="require('../../niemcy.jpeg')">
                        <img v-else-if="m.league === 'Ligue 1'" :src="require('../../francja.jpeg')">
                        <img v-else-if="m.league === 'Premier League'" :src="require('../../anglia.jpeg')">
                        <img v-else-if="m.league === 'Serie A'" :src="require('../../wlochy.jpeg')">
                        <div class="date">
                            <span>{{ m.date }}</span>
                        </div>
                        <div class="info">
                            <span v-if="m.whoWon === 1 || m.whoWon === 0" style="font-weight: bold;">{{ m.team1 }}</span>
                            <span v-else>{{ m.team1 }}</span>
                            <span>{{ m.score }}</span>
                            <span v-if="m.whoWon === 2 || m.whoWon === 0" style="font-weight: bold;">{{ m.team2 }}</span>
                            <span v-else>{{ m.team2 }}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
    return {
      mecze: [
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '5:0', date: '21.11.2020 21:00', whoWon: 1, id: 1},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 2},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 3},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 4},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 5},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 6},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 7},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 8},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 9},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 10},
        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 11},
      ]
    }
  }
}
</script>

<style scope>
    #matchs
    {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;   
    }
    .wider-list
    {
        display: flex;
        justify-content: center;
        width: 80%;
        background-color: white;
    }
    .list
    {
        width: 90%;
        background-color: white;
    }
    .match:first-child
    {
        border-top: 1px solid #ddd;
    }
    .match
    {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 25px;
        border-bottom: 1px solid #ddd;
        color: #777;
        position: relative;
    }
    .match:hover
    {
        opacity: 0.5;
    }
    .date
    {
        display: inline-block;
        width: 135px;
        text-align: center;
    }
    .info
    {
        display: inline-block;
        text-align: center;
        width: 300px;
    }
    .info span
    {
        padding: 10px;
    }
    .list a
    {
        text-decoration: none;
    }
</style>