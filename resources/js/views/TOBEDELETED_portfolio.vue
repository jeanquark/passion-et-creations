<template>
    <v-main>
        <navbar-component></navbar-component>
        <p>
            Start of page<br />
            Images: {{ images }}<br />
            selectedImage: {{ selectedImage }}
        </p>
        <waterfall :line-gap="250" :watch="items">
            <waterfall-slot v-for="(item, index) in items" :width="item.width" :height="item.height" :order="index" :key="index">
                <v-img :lazy-src="item.src" :src="item.src" class="image" style="margin: 5px" @click="selectImage(item)"></v-img>
            </waterfall-slot>
        </waterfall>
        <p>End of page</p>
        <v-dialog v-model="dialog" max-width="60%">
            <v-card>
                <v-card-title class="text-h5 grey lighten-2">
                    <v-btn small @click="moveLeft">Left</v-btn>
                    <v-btn small @click="moveRight">Right</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn small @click="dialog = false">Close</v-btn>
                </v-card-title>
                <v-card-text>
                    <v-row no-gutters>
                        <!-- <v-col cols="1"></v-col> -->
                        <v-col cols="8" class="pa-2">
                            <v-img :src="selectedImage.src"></v-img>
                        </v-col>
                        <v-col cols="4" class="px-4 py-1">
                            <v-row no-gutters>
                                <v-col cols="4" class="pa-1">
                                    <v-img src="/images/portfolio/1920x1200.jpg" aspect-ratio="1"></v-img>
                                </v-col>
                                <v-col cols="4" class="pa-1"> <v-img src="/images/portfolio/3200x1080.jpg" aspect-ratio="1"></v-img> </v-col
                                ><v-col cols="4" class="pa-1"> <v-img src="/images/portfolio/768x1080.jpg" aspect-ratio="1"></v-img> </v-col
                                ><v-col cols="4" class="pa-1">
                                    <v-img src="/images/portfolio/1920x1080.jpg" aspect-ratio="1"></v-img>
                                </v-col>
                            </v-row>
                        </v-col>
                        <!-- <v-col cols="1"></v-col> -->
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-text>
                    <v-spacer></v-spacer>
                    Description image
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-main>
</template>

<script>
import Navbar from '../components/NavbarComponent'
import Waterfall from 'vue-waterfall/lib/waterfall'
import WaterfallSlot from 'vue-waterfall/lib/waterfall-slot'
export default {
    components: { Navbar, Waterfall, WaterfallSlot },
    async created() {
        // 1) Fetch images
        await this.$store.dispatch('images/fetchImages')
    },
    data() {
        return {
            dialog: false,
            selectedImage: '',
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
        }
    },
    methods: {
        selectImage(image) {
            console.log('selectImage image: ', image)
            this.selectedImage = image
            this.dialog = true
        },
        moveLeft() {
            console.log('moveLeft index: ', this.selectedImage.index)
            if (this.selectedImage.index > 0) {
                this.selectedImage = this.items[this.selectedImage.index - 1]
            }
        },
        moveRight() {
            console.log('moveRight index: ', this.selectedImage.index)
            if (this.selectedImage.index < this.items.length - 1) {
                this.selectedImage = this.items[this.selectedImage.index + 1]
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
    border: 2px solid red;
}
</style>
