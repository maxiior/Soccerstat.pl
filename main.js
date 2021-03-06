const vueApp = new Vue({
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
        players: [
            {position:'N', precise: [{position: 'player-N', name: '', lastname: '', rate: '', arms: ''}], p: 1},
            {position:'S', precise: [{position: 'player-LS', name: '', lastname: '', rate: '', arms: ''}, {position: 'player-PS', name: '', lastname: '', rate: '', arms: ''}], p: 2},
            {position:'P', precise: [{position: 'player-SPO', name: '', lastname: '', rate: '', arms: ''}], p: 3},
            {position:'BP', precise: [{position: 'player-LP', name: '', lastname: '', rate: '', arms: ''}, {position: 'player-PP', name: '', lastname: '', rate: '', arms: ''}], p: 4},
            {position:'BO', precise: [{position: 'player-LO', name: '', lastname: '', rate: '', arms: ''}, {position: 'player-PO', name: '', lastname: '', rate: '', arms: ''}], p: 5},
            {position:'SO', precise: [{position: 'player-LSO', name: '', lastname: '', rate: '', arms: ''}, {position: 'player-PSO', name: '', lastname: '', rate: '', arms: ''}], p: 6},
            {position:'BR', precise: [{position: 'player-BR', name: '', lastname: '', rate: '', arms: ''}], p: 7}
        ],
        statistics: [
            {name: 'Possession', proc1: 60, proc2: 40, id: 1},
            {name: 'Shoots', proc1: 6, proc2: 4, id: 2},
            {name: 'Passes', proc1: 60, proc2: 40, id: 3},
            {name: 'Fauls', proc1: 6, proc2: 4, id: 4}
        ],
        squad: [
            {name1: 'Ter Stegen', name2: 'Courtois', id: 1},
            {name1: 'Jordi Alba', name2: 'Carvajal', id: 2},
            {name1: 'Pique', name2: 'Ramos', id: 3},
            {name1: 'Lenglet', name2: 'Varane', id: 4},
            {name1: 'Dest', name2: 'Marcelo', id: 5},
            {name1: 'De Jong', name2: 'Kroos', id: 6},
            {name1: 'Busquets', name2: 'Modrić', id: 7},
            {name1: 'Pjanić', name2: 'Isco', id: 8},
            {name1: 'Messi', name2: 'Benzema', id: 9},
            {name1: 'Ansu Fati', name2: 'Hazard', id: 10},
            {name1: 'Griezmann', name2: 'Vinicius', id: 11},
        ],
        info: [
            {name: 'TEAM NAME:', value: 'Atletico Madryt', id: 1},
            {name: 'AVERAGE GOALS SCORED:', value: '3', id: 2},
            {name: 'AVERAGE GOALS CONCEDED:', value: '1', id: 3},
            {name: 'AVERAGE POSSESSION:', value: '61%', id: 4},
            {name: 'AVERAGE AMOUNT OF SHOOTS:', value: '13', id: 5},
            {name: 'AVERAGE AMOUNT OF PASSES:', value: '644', id: 6},
            {name: 'AVERAGE AMOUNT OF FAULS:', value: '3', id: 7},
            {name: 'RATING:', value: '8.9', id: 8}
        ],
        showAddMatch: false,
        showImport: false,
        showExport: false,
        showInfo: false,
        infoVal: '',
        armsBest: 'photos/La Liga/Atletico Madrid.jpg',
        matchData: '04.02.2021 14:05',
        matchLeague: 'LALIGA',
        matchTeam1: '1',
        matchTeam2: '0',
        matchTeam1Name: 'Levante',
        matchTeam2Name: 'Atletico Madrid',
        arms1src: './photos/La Liga/Levante_UD.jpg',
        arms2src: './photos/La Liga/Atletico Madrid.jpg'


    },
    methods: {
        useOption: function(i){
            switch(i){
                case 0:
                    location.href='TOTY.php';
                    break;
                case 1:
                    location.href='bestteam.php';
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
        },
        style: function(i) 
        {
            switch(i)
            {
                case 0:
                    return { width: `${this.statistics[0].proc1}%` }
                case 1:
                    var x = 100*this.statistics[1].proc1/(parseInt(this.statistics[1].proc2)+parseInt(this.statistics[1].proc1));
                    return { width: `${x}%` }
                case 2:
                    var x = 100*this.statistics[2].proc1/(parseInt(this.statistics[2].proc2)+parseInt(this.statistics[2].proc1));
                    return { width: `${x}%` }
                case 3:
                    var x = 100*this.statistics[3].proc1/(parseInt(this.statistics[3].proc2)+parseInt(this.statistics[3].proc1));
                    return { width: `${x}%` }
            }
            
        }
    }
})