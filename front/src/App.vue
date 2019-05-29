<template>
    <div id="app">
    <!-- Image and text -->
    <nav class="navbar navbar-light navbar-expand-lg bg-light">
        <a class="navbar-brand" href="#">
            <img src="./assets/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
            VueCLIJS / Laravel
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="nav-item my-2 my-lg-0">

                <a href="#"><button class="btn btn-outline-success my-2 my-sm-0 mr-4" type="button">Login</button></a>
                <a href="#"> <button class="btn btn-outline-primary my-2 my-sm-0 mr-4" type="button">Register</button></a>
            </div>
        </div>
    </nav>

    <FirstPage info="Welcome to Your Vue.js App"/>
  </div>
</template>

<script>
import FirstPage from '../../resources/js/components/FirstPage.vue'

export default {
  name: 'app',
  components: {
    FirstPage
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
