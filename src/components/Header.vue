<template>
  <div id="header">
    <div class="top">
      <h1>Soccerstat.pl</h1>
    </div>
    <div class="bottom-bar">
      <div class="all">ALL</div>
      <div v-for="l in ligi" v-bind:key="l.id" class="liga">
        <img :src="l.im">
        {{ l.title }}
      </div>
    </div>
    <div class="options">
      <div v-for="o in opt" v-bind:key="o.id" class="option">
        <div>{{ o.title }}</div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data() {
    return {
      ligi: [
        {title: 'LaLiga', im: require('../../hiszpania.jpeg'), id: 1},
        {title: 'Bundesliga', im: require('../../niemcy.jpeg'), id: 2},
        {title: 'Ligue 1', im: require('../../francja.jpeg'), id: 3},
        {title: 'Premier League', im: require('../../anglia.jpeg'), id: 4},
        {title: 'Serie A', im: require('../../wlochy.jpeg'), id: 5},
      ],
      opt: [
        {title: 'TOTY', id: 1}, 
        {title: 'Best Team', id: 2}, 
        {title: 'Add match', id: 3}, 
        {title: 'Export data', id: 4}
      ]
    }
  }
}
</script>

<style scoped>
  #header
  {
    width: 100%;
  }
  .top
  {
    box-sizing: border-box;
    padding: 10px 50px;
    background-color: #49a300;
    display: block;
  }
  .top h1
  {
    font-weight: 300;
    color: white;
  }
  .bottom-bar
  {
    width: 100%;
    background-color: #275700;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .liga:last-child
  {
    border-right: 0 !important;
  }
  .liga
  {
    background-color: white;
    padding: 5px;
    height: 30px;
    box-sizing: border-box;
    margin-right: 8px;
    cursor: pointer;
    display: flex;
    border-radius: 10px;
  }
  .liga:hover
  {
    opacity: 0.8;
  }
  .liga img
  {
    width: 25px;
    height: 15px;
    margin-right: 3px;
    margin-top: 2px;
  }
  .options
  {
    box-sizing: border-box;
    display: inline-grid;
    align-items: center;
    grid-template-columns: 100px 100px 100px 100px;
    justify-content: center;
    column-gap: 8px;
    width: 100%;
    height: 60px;
    background-color: #343434;
  }
  .all
  {
    cursor: pointer;
    background-color: white;
    box-sizing: border-box;
    height: 30px;
    padding: 5px;
    margin-right: 8px;
    border-radius: 10px;
  }
  .all:hover
  {
    opacity: 0.8;
  }
  .option
  {
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
    height: 35px;
    width: 100px;
    border-radius: 10px;
  }
  .option:hover
  {
    opacity: 0.8;
  }
</style>