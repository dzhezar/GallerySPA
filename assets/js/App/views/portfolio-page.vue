<template>
    <div class="wrapper">
        <navigation></navigation>
        <div v-if="typeof single_photos !== `undefined`" id="carousel" class="carousel" data-ride="carousel" data-interval="false" data-keyboard="false">
            <div class="carousel-inner">
                <div class="carousel-item active" :data-count="1">
                    <img :src="'/uploads/images/'+first_photo.category + '/' + first_photo.image" alt="First slide">
                </div>
                <div v-for="(photo, count) in single_photos" class="carousel-item" :data-count="count+2">
                    <img :src="'/uploads/images/'+ photo.category + '/' + photo.image" alt="">
                </div>
            </div>
            <p id="counter">1 / {{ single_photos.length }}</p>
            <a class="carousel-control-prev control" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-caret-left fa-2x arrow-icon"></i></span>
            </a>
            <a class="carousel-control-next control" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-caret-right fa-2x arrow-icon"></i></span>
            </a>
        </div>
        <div v-else class="grid">
            <div class="grid-item" v-for="photoshoot in photoshoots">
                <a :href="'/uploads/images/'+ photoshoot.id + '/' + photoshoot.first.image " :data-fancybox="photoshoot.slug">
                  <span class="caption">
                    <span class="caption-text">
                      {{ photoshoot.title }}
                    </span>
                  </span>
                    <img class="img" :src="'/uploads/images/' + photoshoot.id + '/' + photoshoot.first.image " alt="">
                </a>
                <div class="display-none carousel-caption-text">
                    {{ photoshoot.title }}
                </div>
                <div class="display-none" :id="'portfolio-item-' + photoshoot.id ">
                    <a v-for="photo in photoshoot.photos" :href="'/uploads/images/' + photoshoot.id + '/' + photo.image " :data-fancybox=" photoshoot.slug ">
                        <img class="img-photoshoot" :src="'/uploads/images/' + photoshoot.id + '/' + photo.image " alt="">
                    </a>
                </div>
            </div>
        </div>
<!--        <footerNav></footerNav>-->
    </div>
</template>

<script>
    import $ from 'jquery';
    import 'bootstrap';
    import '@fancyapps/fancybox';
    let jQueryBridget = require('jquery-bridget');
    let Masonry = require('masonry-layout');
    import 'masonry-layout/dist/masonry.pkgd.min';
    import axios from 'axios';
    import navigation from "../components/navigation";
    import footerNav from "../components/footerNav";
    export default {
        components: {
            navigation,
            footerNav
        },
        data() {
            return {
                counter: 1,
                single_photos: false,
                photoshoots: false,
                first_photo: false,
                slug: this.$route.params.slug
            }
        },
        created() {
            axios
                .get(`/api/getSinglePhotos/${this.slug}`)
                .then(response => {
                    this.single_photos = response.data.images;
                    this.photoshoots = response.data.photoshoots;
                    this.first_photo = response.data.first;
                });

        },
        mounted() {
            $(document).ready(function () {
                // ========================================================================= //
                //  // INITIALIZE GRID
                // ========================================================================= //

                jQueryBridget('masonry', Masonry, $);

                $('.grid').masonry({
                    itemSelector: '.grid-item',
                    horizontalOrder: true
                });

                // ========================================================================= //
                //  // FANCYBOX CONFIG
                // ========================================================================= //
                let fancybox = $("[data-fancybox]");
                if (fancybox.length) {
                    fancybox.fancybox({
                        buttons: ["close"],
                        loop: true,
                        clickContent: false,
                        beforeClose: function () {
                            $('.carousel-caption-text').css('display', 'none');
                        }
                    });
                }
                });
            // ========================================================================= //
            //  // COUNTER FUNC
            // ========================================================================= //
        },
        updated() {
            $(document).ready(function () {
                setTimeout(makeGrid,1000);

                $(window).bind('resize', function () {
                    makeGrid();
                });

                // ========================================================================= //
                 // CAROUSEL KEYBOARD CONTROL
                // ========================================================================= //
                $(document).keydown(function (e) {
                    if (e.keyCode === 37) {
                        e.preventDefault();
                        $(".carousel-control-prev").click();
                    }
                    if (e.keyCode === 39) {
                        e.preventDefault();
                        $(".carousel-control-next").click();
                    }
                });

                $('.control').on('click', function () {
                    setTimeout(counter, 100);
                    counter();
                });

                if (window.screen.width < 769) {
                    $('.grid-item').on('click', function () {
                        $(this).children('.grid-item-caption-text').css('display', 'block');
                    });
                }

                function makeGrid() {

                    $('.img').each(function () {
                        let width = $(this).width();
                        let height = $(this).height();
                        $(this).parent('a').children('.caption').css('width', width).css('height', height);
                        $(this).parent('a').children('.caption').children('.caption-text').css('width', width).css('height', height);
                    });
                }
                // ========================================================================= //
                //  // COUNTER FUNC
                // ========================================================================= //
                function counter() {
                    let target =  $('.carousel-item.active');
                    let count = target[0].dataset.count;
                    let total = $('.carousel-item').length;
                    $('#counter').text(`${count} / ${total}`);
                }
            });
        }
    }
</script>
<style src="../../../css/carousel-page.css" scoped></style>
<style src="../../../css/media-queries/carousel-page_responsive.css" scoped></style>
<style src="../../../css/grid-page.css" scoped></style>
<style src="../../../css/media-queries/grid-page_responsive.css" scoped></style>
<style>
    @import "https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css";
</style>



