<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=chrome,edge=1"/>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

        <title>Soccerstat</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    </head>
    <body>
        <div id="app">
            <div id="header">
                <div class="top">
                    <h1>Soccerstat.pl</h1>
                </div>
                <div class="bottom-bar">
                    <div class="all">
                        <div>ALL</div>
                    </div>
                    <div v-for="l in ligi" v-bind:key="l.id" class="liga">
                        <img :src="l.im">
                        <div>{{ l.title }}</div>
                    </div>
                </div>
                <div class="options">
                    <a v-for="o in opt" v-bind:key="o.id" href="#">
                        <div class="option">
                            <div>{{ o.title }}</div>
                        </div>
                    </a>
                </div>
            </div>

            <div id="matchs">
                <div class="wider-list">
                    <div class="list">
                        <a href="#">
                            <div v-for="m in mecze" v-bind:key="m.id" class="match">
                                <img v-if="m.league === 'LaLiga'" src="hiszpania.jpeg">
                                <img v-else-if="m.league === 'Bundesliga'" src="niemcy.jpeg">
                                <img v-else-if="m.league === 'Ligue 1'" src="francja.jpeg">
                                <img v-else-if="m.league === 'Premier League'" src="anglia.jpeg">
                                <img v-else-if="m.league === 'Serie A'" src="wlochy.jpeg">
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

            <div class="padding"></div>

            <div id="footer">
                <div>
                    <div class="name">Soccerstat.pl</div>
                    <div>
                        Created by Maksim Brzezinski & Kacper Buczko & Miłosz Orliński & Dawid Bronszkiewicz
                    </div>
                </div>
            </div>
        </div>

        <script>
            new Vue({
                el: '#app',
                data: {
                    ligi: [
                        {title: 'LaLiga', im: 'hiszpania.jpeg', id: 1},
                        {title: 'Bundesliga', im: 'niemcy.jpeg', id: 2},
                        {title: 'Ligue 1', im: 'francja.jpeg', id: 3},
                        {title: 'Premier League', im: 'anglia.jpeg', id: 4},
                        {title: 'Serie A', im: 'wlochy.jpeg', id: 5}
                    ],
                    opt: [
                        {title: 'TOTY', link: 'Best.vue', id: 1}, 
                        {title: 'Best Team', link: 'Best.vue', id: 2}, 
                        {title: 'Add match', link: 'Best.vue', id: 3}, 
                        {title: 'Export data', link: 'Best.vue', id: 4}
                    ],
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
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 12},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 13},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 14},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 15},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 16},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 17},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 18},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 19},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 20},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 21},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 22},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 23},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 24},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 25},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 26},
                        {league: 'LaLiga', team1: 'FC Barcelona', team2: 'Real Madryt', score: '3:2', date: '23.11.2020 21:00', whoWon: 1, id: 27}
                    ]
                }
            })
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
