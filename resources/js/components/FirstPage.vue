<template>
    <div class="container-fluid">
        <h1 class="mt-3 mb-3">News Feed</h1>
<!--        If there is an eror with axios request-->
        <section v-if="errored" >
            <p>Sorry, I could not load the data.</p>
        </section>
<!--        Axios request is good-->
        <section v-else >
<!--            Dropdown that allow to change the source-->
            <div class="text-left dropdown">
                <select v-model="source" :key="source"  >
                    <option v-for="option in options" v-bind:value="option.value" >
                        {{option.text}}
                    </option>
                </select>
            </div>
<!--Waiting for the Axios Request-->
            <div v-if="loading">
                Loading ...
            </div>
<!--            We now have the Axios request so we can display some news with Bootstrap card element-->
            <div v-else
                v-for="article in info"
                v-bind:key="article.title"
                class="card mb-2 border-dark"
                style=";">
                <div class="row no-gutters d-flex ">
                    <div class="col-md-4">
                        <img :src="article.urlToImage" :alt="article.title" class="card-img-top" style="height: 100%;">
                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body " style="height: 222px">
                            <h5 class="card-title pb-4 "> <a :href="article.url">{{article.title}}</a></h5>
                            <p class="card-text pb-4">{{article.description}}</p>
                            <p class="card-text" v-if="article.author != null"> Written by {{article.author}}</p>
                        </div>
<!--                        Only available when you are logged in, else it shows nothing-->
                        <div v-if="propMessage != null" class="card-footer bg-white align-self-end ">
                            <form method="post" action="/favorites/store">
                                <input type="hidden" name="_token" :value="csrf">
                                <input type="hidden" :value="propMessage" name="user_id"/>
                                <input type="hidden" :value="article.title" name="title"/>
                                <input type="hidden" :value="article.description" name="description"/>
                                <input type="hidden" :value="article.author" name="author"/>
                                <input type="hidden" :value="article.urlToImage" name="urlToImage"/>
                                <input type="hidden" :value="article.url" name="url"/>
                                <button type="submit" class="btn btn-info"><i class="far fa-star "></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script type="text/babel" >
    import axios from 'axios/index'

    export default {
        props:['propMessage'],
        data () {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                info: '',
                loading: true,
                errored: false,
                source: 'cnn',
                options: [
                    {text:'Cnn',value:'cnn'},
                    {text:'Abc News',value:'abc-news'},
                    {text:'Google News',value:'google-news'},
                    {text:"L'équipe",value:'lequipe'},

                ]
            }
        },
        watch: {
            // whenever source changes, this function will run
            source: function (newSource) {
                this.source = newSource
                axios.get('https://newsapi.org/v2/top-headlines?sources='+this.source+'&apiKey=60bfaf62fd794a8f8f60f8df42762cae')
                    .then(response => (this.info = response.data.articles))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        },
        mounted(){
            axios.get('https://newsapi.org/v2/top-headlines?sources=cnn&apiKey=60bfaf62fd794a8f8f60f8df42762cae')
                .then(response => (this.info = response.data.articles))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
    }
</script>

<style scoped>

</style>
