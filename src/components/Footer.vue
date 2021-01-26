<template>
  <div id="footer">
    <div>
      <div class="name">Soccerstat.pl</div>
      <div>
        Created by Maksim Brzezinski & Kacper Buczko & Miłosz Orliński & Dawid Bronszkiewicz
      </div>
    </div>
  </div>
</template>

<script>

export default {
}
</script>

<style scoped>
    #footer
    {
      display: flex;
      align-items: center;
      color: white;
      position: absolute;
      width: 100%;
      height: 100px;
      background-color: #343434;
      bottom: 0;
      padding: 0 20px;
      box-sizing: border-box;
    }
    .name
    {
      font-size: 20px;
      margin-bottom: 5px;
    }
</style>