<template>
    <div id="feed">
    <!-- Image and text -->
<!--    <nav class="navbar navbar-light navbar-expand-lg bg-light">-->
<!--        <a class="navbar-brand" href="#">-->
<!--            <img src="../assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">-->
<!--            VueCLIJS / Laravel-->
<!--        </a>-->
<!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse " id="navbarSupportedContent">-->
<!--            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">-->
<!--            </ul>-->
<!--            <form class="form-inline my-2 my-lg-0">-->

<!--                <a href="/login"><button class="btn btn-outline-success my-2 my-sm-0 mr-4" type="button">Login</button></a>-->
<!--                <a href="/registe"> <button class="btn btn-outline-primary my-2 my-sm-0" type="button">Register</button></a>-->
<!--            </form>-->
<!--        </div>-->
<!--    </nav>-->
        {{this.propMessage}}Hello
        <FirstPage :prop-message = 'this.propMessage'  />

  </div>

</template>

<script>
import FirstPage from './FirstPage.vue'



export default {
    props:['propMessage'],
    mounted(){
        console.dir(this.propMessage)
        console.dir(this.obj)
    },
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
