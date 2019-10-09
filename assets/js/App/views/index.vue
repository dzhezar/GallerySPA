<template>
    <router-link :to="{'name' : 'portfolio', 'params' : {'slug' : 'editorials'}}" class="main_img" v-bind:style="{ backgroundImage: 'url(uploads/indexImages/' + main_img + ')' }">
        <div class="main_img_text">
            Wojciech Foit
        </div>
    </router-link>
</template>

<script>
    import $ from 'jquery';
    import axios from 'axios';
    $('.main_img_text').html('qqqasd');
    export default {
        components: {

        },
        data() {
            return {
                main_img: null
            }
        },
        mounted() {
            axios
                .get('/api/getMainImg')
                .then(response => {
                    this.main_img = response.data.main_img
                });
        },
    }
</script>
<style src="../../../css/app.css" scoped></style>
<style src="../../../css/media-queries/app_responsive.css" scoped></style>


