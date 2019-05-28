<template>
    <div class="container-fluid">
        <h1>News Feed</h1>
        <section v-if="errored" >
            <p>Je suis désolé, je n'ai pas pu récuperer ces informations.</p>
        </section>
        <section v-else>
            <div v-if="loading">
                Chargement...
            </div>
                <div
                v-else
                v-for="article in info"
                class="card mb-2 border-dark"
                style=";"
                >
                    <div class="row no-gutters d-flex ">
                        <div class="col-md-4 ">
                            <img :src="article.urlToImage" :alt="article.title" class="card-img-top">
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body "
                            style="height: 222px">
                                <h5 class="card-title pb-4 "> <a :href="article.url">{{article.title}}</a></h5>
                                <p class="card-text pb-4">{{article.description}}</p>
                                <p class="card-text" v-if="article.author != null"> Written by {{article.author}}</p>
                            </div>
                            <div class="card-footer bg-white align-self-end ">
                                <i class="far fa-star "></i>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</template>

<script type="text/babel" >
    import axios from 'axios'

    export default {
        data () {
            return {
                info: '',
                loading: true,
                errored: false
            }
        },
        created(){
            axios.get('https://newsapi.org/v2/top-headlines?sources=cnn&apiKey=60bfaf62fd794a8f8f60f8df42762cae')
                .then(response => (this.info = response.data.articles))
                .catch(error => console.log(error))
                .finally(() => this.loading = false)
        }
    }
</script>

<style scoped>

</style>
