<template>
  <div id="app">
    <Header />
    <MatchList />
    <Footer />
  </div>
</template>

<script>
import Header from './components/Header.vue'
import MatchList from './components/MatchList.vue'
import Footer from './components/Footer.vue'
export default {
  name: 'app',
  components: {
      Header,
      MatchList,
      Footer
  }
}
</script>

<style scoped>
  #app
  {
    position: relative;
    font-family: 'Work Sans', sans-serif;
    width: 100%;
    height: 1000px;
    background-color: #DDD;
  }
</style>