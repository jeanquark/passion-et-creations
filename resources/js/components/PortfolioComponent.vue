<template>
    <v-row no-gutters justify="center" id="portfolio" class="my-10" style="border: 1px solid red;">
        <v-col cols="12" md="10" class="px-4" style="border: 1px dashed pink;">
            <h2 class="text-center my-2" style="color: #c49a6c;">Portfolio</h2>
            <!-- Start of page<br /> -->
            <!-- Images: {{ images }}<br /> -->
            <!-- selectedImage: {{ selectedImage }} -->
            <!-- portfolios: {{ portfolios.length }}<br /><br /> -->
            <!-- selectedPortfolio: {{ selectedPortfolio }}<br /><br /> -->
            <v-expand-transition>
            <waterfall :line-gap="250" :watch="portfolios">
                <waterfall-slot v-for="(portfolio, index) in portfolios" :width="frontImage(portfolio)['width']" :height="frontImage(portfolio)['height']" :order="index" :key="index">
                    <v-img
                        :lazy-src="`/thumbnails${frontImage(portfolio)['thumbnail_path']}`"
                        :src="`/thumbnails${frontImage(portfolio)['thumbnail_path']}`"
                        class="image"
                        style="margin: .5em"
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
            </v-expand-transition>

            <div class="text-center my-3">
                <v-icon size="60" class="icon" @click="showAllPortfolios = true" v-if="!showAllPortfolios">mdi-plus</v-icon>
                <v-icon size="60" class="icon" @click="showAllPortfolios = false" v-else>mdi-minus</v-icon>
            </div>
            <!-- <v-btn small color="primary" class="text-center">Afficher plus</v-btn> -->
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
                            <v-col cols="8" class="pa-2" v-if="selectedImage">
                                <v-img :src="`/medias${selectedImage.path}`"></v-img>
                            </v-col>
                            <v-col cols="4" class="px-4 py-1">
                                <v-row no-gutters>
                                    <v-col cols="4" class="pa-1" v-for="(image, index) in selectedPortfolio.portfolio_images" :key="index">
                                        <v-img
                                            :src="`/medias${image.path}`"
                                            aspect-ratio="1"
                                            class="thumbnail"
                                            :class="[selectedImage.path !== image.path ? 'transparent' : '']"
                                            @click="selectImage(image)"
                                        >
                                        </v-img>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </v-card-text>

                    <v-divider></v-divider>

                    <v-card-text class="mt-3">
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
            showAllPortfolios: false
        }
    },
    computed: {
        // images() {
        //     return this.$store.getters['images/images']
        // },
        portfolios() {
            if (!this.showAllPortfolios) {
                return [...this.$store.getters['portfolios/portfolios']].splice(0, 20)
            } else {
                return this.$store.getters['portfolios/portfolios']
            }
        }
    },
    methods: {
        frontImage(portfolio) {
            try {
                return portfolio.portfolio_images.find(image => image.is_front_image == true)
            } catch (error) {
                console.log('error: ', error)
            }
        },
        selectPortfolio(portfolio, index) {
            console.log('selectPortfolio portfolio: ', portfolio, index)
            this.selectedPortfolio = portfolio
            this.selectedPortfolio['index'] = index
            this.selectedImage = this.selectedPortfolio.portfolio_images[0]
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
    /* border: 2px solid #c49a6c; */
    opacity: .5;
}
.thumbnail:hover {
    cursor: pointer;
    opacity: 1;
}
.icon:hover {
    color: #c49a6c;
}
.transparent {
    opacity: 0.5;
}
</style>
