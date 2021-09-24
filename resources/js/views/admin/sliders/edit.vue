<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <h2>Editer carousel {{ $route.params.id }}</h2>
        <!-- slider: {{ slider }}<br /><br /> -->
        <!-- sliderImages: {{ sliderImages }}<br /><br /> -->
        <!-- sliderImagesList: {{ sliderImagesList }}<br /><br /> -->
        <v-row no-gutters justify="center">
            <v-col cols="10" style="border: 1px solid pink">
                <v-form @submit.prevent="updateSlider">
                    <draggable tag="v-row" group="people" handle=".draggable" v-model="sliderImagesList">
                        <v-col cols="12" md="3" lg="2" class="draggable" v-for="image in sliderImagesList" :key="image.id">
                            <v-hover v-slot="{ hover }">
                                <div class="text-center">
                                    <v-img :src="`/medias/${image.image_path}`" height="100" class="image"></v-img>
                                    <v-btn small color="error" class="mt-2" @click="deleteImage(image)" v-if="hover">Supprimer</v-btn>
                                </div>
                            </v-hover>
                        </v-col>
                        <v-col cols="12" md="3" lg="2" class="" style="">
                            <v-hover v-slot="{ hover }">
                                <v-card
                                    height="100"
                                    width="100%"
                                    :elevation="hover ? 12 : 2"
                                    :class="{ 'on-hover': hover }"
                                    class="d-flex justify-center align-center"
                                    style="border: 2px dashed #ccc"
                                    @click="dialog = !dialog"
                                >
                                    <v-card-text class="text-center" style="">
                                        <v-icon x-large>mdi-plus</v-icon>
                                    </v-card-text>
                                </v-card>
                            </v-hover>
                        </v-col>
                    </draggable>
                    <v-row no-gutters class="my-5" justify="center">
                        <v-btn small color="success" type="submit" :loading="false">Editer</v-btn>
                    </v-row>
                </v-form>
            </v-col>
        </v-row>
        <v-row no-gutters justify="center" v-if="sliderImagesList.length"> </v-row>
        <v-dialog v-model="dialog" width="800">
            <medias-component @addFile="onAddFile"></medias-component>
        </v-dialog>
    </v-main>
</template>

<script>
import draggable from 'vuedraggable'
import MediasComponent from '../../../components/MediasComponent'
export default {
    name: 'AdminSlidersEdit',
    components: { draggable, MediasComponent },
    async created() {
        try {
            if (this.$store.getters['sliders/sliders'].length < 1) {
                await this.$store.dispatch('sliders/fetchSliders')
            }
            // this.form.fill(this.slider)
            this.sliderImagesList = this.slider.slider_images.sort((a, b) => a.order - b.order)
        } catch (error) {
            console.log('error: ', error)
        }
    },
    data() {
        return {
            items: [
                {
                    text: 'Carousels',
                    disabled: false,
                    to: '/admin/sliders',
                    exact: true,
                    link: true,
                },
                {
                    text: 'Editer',
                    disabled: true,
                    href: '/admin/sliders',
                },
            ],
            dialog: false,
            sliderImagesList: [],
        }
    },
    computed: {
        sliders() {
            return this.$store.getters['sliders/sliders']
        },
        slider() {
            return this.sliders.find((slider) => slider.id == this.$route.params.id)
        },
    },
    methods: {
        addImage() {
            console.log('addImage')
            this.showMediasModal = true
        },
        deleteImage(image) {
            console.log('deleteImage image: ', image)
            const index = this.sliderImagesList.findIndex((el) => el.id === image.id)
            console.log('index: ', index)
            this.sliderImagesList.splice(index, 1)
        },
        onAddFile(file) {
            console.log('onAddFile file: ', file)
            file['order'] = this.sliderImagesList.length
            file['image_path'] = file.path
            this.dialog = false
            this.sliderImagesList.push(file)
        },
        async updateSlider() {
            try {
                console.log('updateSlider: ', this.sliderImagesList)
                this.sliderImagesList.forEach((image, index) => {
                    image.order = index
                })

                await this.$store.dispatch('sliders/updateSlider', { id: this.$route.params.id, sliderImages: this.sliderImagesList })
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'success',
                    content: 'Carousel edité avec succès.',
                })
                this.$router.push('/admin/sliders')
            } catch (error) {
                console.log('error: ', error)
                this.$store.commit('snackbars/SET_SNACKBAR', {
                    show: true,
                    color: 'error',
                    content: "Une erreur est survenue et le carousel n'a pas pu être edité.",
                })
            }
        },
    },
}
</script>

<style scoped>
.image:hover {
    cursor: pointer;
}
.v-card--reveal {
    align-items: center;
    bottom: 0;
    justify-content: center;
    opacity: 0.8;
    position: absolute;
    width: 100%;
}
</style>
