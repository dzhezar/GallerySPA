<template>
    <div id="footer">
        <div class="container">
            <div class="socials-media text-center">
                <ul class="list-unstyled">
                    <li><a v-bind:href=" links.facebook " target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a v-bind:href=" links.instagram " target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li><a v-bind:href=" links.tumblr " target="_blank"><i class="fab fa-tumblr-square"></i></a></li>
                    <li><a v-bind:href="'mailto:' + links.mail " target="_blank"><i class="fas fa-envelope"></i></a></li>
                </ul>
            </div>
            <div class="credits">
                <a target="_blank" href="https://octowice.com/">
                    <p class="text-muted small mb-0">Copyright &copy; Octowice
                    </p>
                </a>
            </div>

        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        components: {

        },
        data() {
            return {
                links: null
            }
        },
        mounted() {
            axios
                .get('/api/getSocialLinks')
                .then(response => {
                    this.links = response.data.links;
                    }
                )
        },
    }
</script>


