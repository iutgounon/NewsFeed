<template>
    <div class="container">
        <div class="row justify-content-center">
            <div id="app" class="col-md-8">

                {{ info }}

<!--                <div-->
<!--                v-for="article in info"-->
<!--                class="article"-->
<!--                >-->
<!--                    {{article.title}}-->
<!--                </div>-->

            </div>
        </div>

    </div>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
