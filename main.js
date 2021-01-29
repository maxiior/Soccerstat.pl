new Vue({
    el: '#app',
    data: {
        ligi: [
            {title: 'LaLiga', im: 'photos/hiszpania.jpeg', id: 1},
            {title: 'Bundesliga', im: 'photos/niemcy.jpeg', id: 2},
            {title: 'Ligue 1', im: 'photos/francja.jpeg', id: 3},
            {title: 'Premier League', im: 'photos/anglia.jpeg', id: 4},
            {title: 'Serie A', im: 'photos/wlochy.jpeg', id: 5}
        ],
        opt: [
            {title: 'TOTY', link: 'Best.vue', id: 1}, 
            {title: 'Best Team', link: 'Best.vue', id: 2}, 
            {title: 'Add match', link: 'Best.vue', id: 3}, 
            {title: 'Import data', link: 'Best.vue', id: 4},
            {title: 'Export data', link: 'Best.vue', id: 5}
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
        ],
        showAddMatch: false,
        showImport: false,
        showExport: false
    },
    methods: {
        useOption: function(i){
            switch(i){
                case 0:
                    location.href='TOTY.php';
                    break;
                case 1:
                    break;
                case 2:
                    this.showAddMatch=true;
                    break;
                case 3:
                    this.showImport=true;
                    break;
                case 4:
                    this.showExport=true;
                    break;
            }
        }
    }
})