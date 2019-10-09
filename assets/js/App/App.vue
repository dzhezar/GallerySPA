<template>
    <transition name="router-anim" enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
    <router-view :key="$route.fullPath"></router-view>
    </transition>
</template>

<script>
    import 'bootstrap'
    import 'animate.css'
    import '@fortawesome/fontawesome-free/js/fontawesome'
    import '@fortawesome/fontawesome-free/js/solid'
    import '@fortawesome/fontawesome-free/js/regular'
    import '@fortawesome/fontawesome-free/js/brands'
    import { config } from '@fortawesome/fontawesome-svg-core'

    config.autoReplaceSvg = false;

    export default {
    }
</script>

<style src="../../css/app.css"></style>
<style src="../../css/media-queries/app_responsive.css"></style>
<style>
    @import "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css";
</style>
