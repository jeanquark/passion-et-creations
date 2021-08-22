<template>
    <v-app>
        <p>Start of page</p>
        <v-btn small color="primary"> Click me </v-btn><br />
        <waterfall :line-gap="250" :watch="items">
            <waterfall-slot v-for="(item, index) in items" :width="item.width" :height="item.height" :order="index" :key="index">
                <v-img :lazy-src="item.src" :src="item.src" style="margin: 5px" @click="dialog = true"></v-img>
            </waterfall-slot>
        </waterfall>
        <p>End of page</p>
        <v-dialog v-model="dialog" max-width="60%">
            <v-card>
                <v-row no-gutters>
                    <v-col cols="8" class="pa-2">
                        <v-img src="/images/portfolio/1920x1080.jpg"></v-img>
                    </v-col>
                    <v-col cols="4" class="px-4 py-1">
                        <v-row no-gutters>
                            <v-col cols="4" class="pa-1">
                                <v-img src="/images/portfolio/1920x1200.jpg" aspect-ratio="1"></v-img>
                            </v-col>
                            <v-col cols="4" class="pa-1">
                                <v-img src="/images/portfolio/3200x1800.jpg" aspect-ratio="1"></v-img> </v-col
                            ><v-col cols="4" class="pa-1">
                                <v-img src="/images/portfolio/768x1080.jpg" aspect-ratio="1"></v-img> </v-col
                            ><v-col cols="4" class="pa-1">
                                <v-img src="/images/portfolio/1920x1080.jpg" aspect-ratio="1"></v-img>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>

                <v-divider></v-divider>

                <v-card-text>
                    <v-spacer></v-spacer>
                    Description image
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
import Waterfall from 'vue-waterfall/lib/waterfall'
import WaterfallSlot from 'vue-waterfall/lib/waterfall-slot'
export default {
    components: { Waterfall, WaterfallSlot },
    data() {
        return {
            dialog: false,
            items: [
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { src: '/images/portfolio/3200x1800.jpg', height: 1800, width: 3200 },
                { src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { src: '/images/portfolio/3200x1800.jpg', height: 1800, width: 3200 },
                { src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { src: '/images/portfolio/3200x1800.jpg', height: 1800, width: 3200 },
                { src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/1920x1200.jpg', height: 1200, width: 1920 },
                { src: '/images/portfolio/3200x1800.jpg', height: 1800, width: 3200 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
                { src: '/images/portfolio/3200x1800.jpg', height: 1800, width: 3200 },
                { src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { src: '/images/portfolio/768x1080.jpg', height: 1080, width: 768 },
                { src: '/images/portfolio/1920x1080.jpg', height: 1080, width: 1920 },
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
            ],
        }
    },
}
</script>

<style scoped>
.v-image:hover {
    cursor: pointer;
    border: 2px solid red;
}
</style>