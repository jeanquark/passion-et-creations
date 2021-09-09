<template>
    <v-row no-gutters justify="center" id="portfolio" class="my-10">
        <v-col cols="12" md="10">
            <h2 class="text-center my-2">Portfolio</h2>
            <!-- Start of page<br /> -->
            <!-- Images: {{ images }}<br /> -->
            <!-- selectedImage: {{ selectedImage }} -->
            <!-- portfolios: {{ portfolios }}<br /> -->
            <waterfall :line-gap="250" :watch="portfolios">
                <waterfall-slot v-for="(portfolio, index) in portfolios" :width="frontImage(portfolio)['width']" :height="frontImage(portfolio)['height']" :order="index" :key="index">
                    <v-img
                        :lazy-src="`/medias${frontImage(portfolio)['path']}`"
                        :src="`/medias${frontImage(portfolio)['path']}`"
                        class="image"
                        style="margin: 5px"
                        @click="selectPortfolio(portfolio, index)"
                        v-if="frontImage(portfolio)"
                    ></v-img>
                    <!-- {{ portfolio.images[0]['path'] }} -->
                    <!-- <v-img :lazy-src="`/medias/${portfolio.images[0]['path']}`" :src="`/medias/${portfolio.images[0]['path']}`" class="image" style="margin: 5px" @click="selectImage(portfolio)"></v-img> -->
                </waterfall-slot>
                <!-- <waterfall-slot v-for="(item, index) in items" :width="item.width" :height="item.height" :order="index" :key="index">
                    <v-img :lazy-src="item.src" :src="item.src" class="image" style="margin: 5px" @click="selectImage(item)"></v-img>
                </waterfall-slot> -->
            </waterfall>
            <!-- <p>End of page</p> -->
            <v-dialog v-model="dialog" max-width="60%" v-if="selectedPortfolio">
                <v-card>
                    <v-card-title class="text-h5 grey lighten-2">
                        <div v-html="selectedPortfolio.title"></div>
                        <v-spacer></v-spacer>
                        <v-icon large @click="moveLeft" class="mx-1 icon">mdi-arrow-left-bold-circle-outline</v-icon>
                        <v-icon large class="mx-1 icon" @click="moveRight">mdi-arrow-right-bold-circle-outline</v-icon>
                        <v-icon large class="ml-2 icon" @click="dialog = false">mdi-close</v-icon>
                    </v-card-title>
                    <v-card-text>
                        <v-row no-gutters>
                            <!-- selectedPortfolio: {{ selectedPortfolio }}<br /><br /> -->
                            <!-- selectedImage: {{ selectedImage }}<br /><br /> -->
                            <v-col cols="8" class="pa-2" v-if="selectedImage">
                                <v-img :src="`/medias${selectedImage.path}`"></v-img>
                            </v-col>
                            <v-col cols="4" class="px-4 py-1">
                                <v-row no-gutters>
                                    <v-col cols="4" class="pa-1" v-for="(image, index) in selectedPortfolio.images" :key="index">
                                        <!-- image: {{ image }} -->
                                        <v-img :src="`/medias${image.path}`" aspect-ratio="1" class="image" @click="selectImage(image)"></v-img>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-text>
                        <v-spacer></v-spacer>
                        <div v-html="selectedPortfolio.description"></div>
                    </v-card-text>
                </v-card>
            </v-dialog>
        </v-col>
    </v-row>
</template>

<script>
import Waterfall from 'vue-waterfall/lib/waterfall'
import WaterfallSlot from 'vue-waterfall/lib/waterfall-slot'
export default {
    components: { Waterfall, WaterfallSlot },
    async created() {
        try {
            if (this.$store.getters['portfolios/portfolios']) {
                this.$store.dispatch('portfolios/fetchPortfolios')
            }
        } catch (error) {
            console.log('error: ', error)
        }
    },
    data() {
        return {
            dialog: false,
            selectedPortfolio: null,
            selectedImage: null,
            items: [
                { index: 0, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 1, name: '1920x1200.jpg', src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { index: 2, name: '3200x1080.jpg', src: '/images/portfolio/3200x1080.jpg', height: 1080, width: 3200 },
                { index: 3, name: '768x1080.jpg', src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { index: 4, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 5, name: '1920x1200.jpg', src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { index: 6, name: '3200x1080.jpg', src: '/images/portfolio/3200x1080.jpg', height: 1080, width: 3200 },
                { index: 7, name: '768x1080.jpg', src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { index: 8, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 9, name: '1920x1200.jpg', src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { index: 10, name: '3200x1080.jpg', src: '/images/portfolio/3200x1080.jpg', height: 1080, width: 3200 },
                { index: 11, name: '768x1080.jpg', src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { index: 12, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 13, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 14, name: '1920x1200.jpg', src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { index: 15, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 16, name: '1920x1200.jpg', src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { index: 17, name: '3200x1080.jpg', src: '/images/portfolio/3200x1080.jpg', height: 1080, width: 3200 },
                { index: 18, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { index: 19, name: '3200x1080.jpg', src: '/images/portfolio/3200x1080.jpg', height: 1080, width: 3200 },
                { index: 20, name: '768x1080.jpg', src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { index: 21, name: '768x1080.jpg', src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { index: 22, name: '1920x1080.jpg', src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 }
                // { id: 1, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic.jpg', height: 300, width: 300 },
                // { id: 2, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic0.jpg', height: 300, width: 300 },
                // { id: 3, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic1.jpg', height: 100, width: 100 },
                // { id: 4, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic2.jpg', height: 100, width: 100 },
                // { id: 5, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic7.jpg', height: 1188, width: 1200 },
                // { id: 6, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic4.jpg', height: 300, width: 300 },
                // { id: 7, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic5.jpg', height: 300, width: 300 },
                // { id: 8, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic6.jpg', height: 300, width: 300 },
                // { id: 9, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic7.jpg', height: 1188, width: 1200 },
                // { id: 10, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic8.jpg', height: 300, width: 300 },
                // { id: 11, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic9.jpg', height: 2315, width: 2315 },
                // { id: 12, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pavlova.jpg', height: 853, width: 1280 },
                // { id: 13, src: 'https://raw.githubusercontent.com/SUNbrightness/my-img/master/test/pic.jpg', height: 300, width: 300 },
            ]
        }
    },
    computed: {
        images() {
            return this.$store.getters['images/images']
        },
        portfolios() {
            return this.$store.getters['portfolios/portfolios'].splice(0, 16)
        }
    },
    methods: {
        frontImage(portfolio) {
            try {
                return portfolio.images.find(image => image.is_front_image == true)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        // frontImageSrc(portfolio) {
        //     try {
        //         return portfolio.images.find(image => image.is_front_image == true)['path']
        //         // return '/medias/images/1920x1080.jpg'
        //     } catch (error) {
        //         console.log('error: ', error)
        //     }
        // },
        // frontImageWidth (portfolio) {
        //     try {
        //         return portfolio.images.find(image => image.is_front_image == true)['width']
        //         // return 1080
        //     } catch (error) {
        //         console.log('error: ', error)
        //     }
        // },
        // frontImageHeight(portfolio) {
        //     try {
        //         return portfolio.images.find(image => image.is_front_image == true)['height']
        //     } catch (error) {
        //         console.log('error: ', error)
        //     }
        // },
        selectPortfolio(portfolio, index) {
            console.log('selectPortfolio portfolio: ', portfolio)
            this.selectedPortfolio = portfolio
            this.selectedPortfolio['index'] = index
            this.selectedImage = this.selectedPortfolio.images[0]
            this.dialog = true
        },
        selectImage(image) {
            console.log('selectImage image: ', image)
            this.selectedImage = image
        },
        moveLeft() {
            console.log('moveLeft index: ', this.selectedPortfolio.index)
            if (this.selectedPortfolio.index > 0) {
                // this.selectedPortfolio = this.portfolios[this.selectedPortfolio.index - 1]
                this.selectPortfolio(this.portfolios[this.selectedPortfolio.index - 1], this.selectedPortfolio.index - 1)
            }
        },
        moveRight() {
            console.log('moveRight index: ', this.selectedPortfolio.index)
            if (this.selectedPortfolio.index < this.portfolios.length - 1) {
                this.selectPortfolio(this.portfolios[this.selectedPortfolio.index + 1], this.selectedPortfolio.index + 1)
            }
        }
    }
}
</script>

<style scoped>
/* .v-image:hover {
    cursor: pointer;
    border: 2px solid red;
} */
.image:hover {
    cursor: pointer;
    border: 2px solid #c49a6c;
}
.icon:hover {
    color: #c49a6c;
}
</style>
