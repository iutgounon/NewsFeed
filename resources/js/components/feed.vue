<template>
    <div id="feed">
<!--        Call Vue FirstPage with the propMessage-->
        <FirstPage :prop-message = 'this.propMessage'    />
    </div>

</template>

<script>
import FirstPage from './FirstPage.vue'

export default {
    props:['propMessage'],
   name: 'feed',
   components: {
    FirstPage,
  }
}
</script>

<style>
#feed {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
