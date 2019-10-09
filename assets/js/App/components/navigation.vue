<template>
    <nav>
    <div class="row py-2-lg">
        <div class="responsive-menu">
            <div class="responsive"><i class="fas fa-bars pr-3"></i></div>
            <p class="logo"><a>wojciech</a></p>
            <ul class="nav nav-menu justify-content-around">
                <li class="nav-item" v-for="category in categories">
                    <router-link :to="{'name' : 'portfolio', 'params' : {slug : category.slug}}">
                        {{ category.name }}
                    </router-link>
                </li>
            </ul>
        </div>
    </div>
    </nav>
</template>

<script>
    import axios from 'axios';
    export default {
        components: {

        },
        data() {
            return {
                categories: null
            }
        },
        mounted() {
            axios
                .get('/api/getCategories')
                .then(response => {
                    this.categories = response.data.categories
                });
        },
    }
</script>


