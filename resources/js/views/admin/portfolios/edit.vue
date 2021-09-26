<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <div v-if="portfolio">
            <!-- <h2>Éditer portfolio {{ $route.params.id }}</h2> -->
            <!-- portfolio: {{ portfolio }} -->
            <!-- portfolio.images: {{ portfolio.image }}<br /><br /> -->
            <!-- frontImages: {{ frontImages }}<br /><br /> -->
            <!-- backImages: {{ backImages }}<br /><br /> -->
            <!-- frontImagesList: {{ frontImagesList }}<br /><br /> -->
            <!-- backImagesList: {{ backImagesList }}<br /><br /> -->
            <!-- form: {{ form }}<br /><br /> -->
        </div>

        <v-dialog v-model="dialog" width="800">
            <medias-component @addFile="onAddFile"></medias-component>
        </v-dialog>
        <!-- <v-row no-gutters class="my-5" style="border: 1px solid grey">
            <v-col cols="6">
                <h3>Draggable 3 (list3_2)</h3>
                <draggable class="list-group2" group="people2" draggable="[]" v-model="list3">
                    <div class="list-group2-item" v-for="element in list3_2" :key="element.name">{{ element.name }}</div>
                </draggable>
            </v-col>

            <v-col cols="6">
                <h3>Draggable 4 (list4_2)</h3>
                <draggable class="list-group2" group="people2" v-model="list4">
                    <div class="list-group2-item" v-for="element in list4_2" :key="element.name">{{ element.name }}</div>
                </draggable>
            </v-col>
        </v-row> -->

        <v-card class="mx-4 pa-2" v-if="form">
            <v-form @submit.prevent="editPortfolio">
                <v-card-text>
                    <v-row no-gutters class="my-4">
                        <v-col cols="12">
                            <v-text-field label="Titre" v-model="form.title"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <text-editor-component @toggleShowHTML="toggleShowHTML" :formContent="form.description" v-if="form.description" />
                        </v-col>
                    </v-row>
                    <v-row no-gutters style="border: 1px solid green">
                        <v-col cols="12" md="4">
                            frontImagesList: {{ frontImagesList }}
                            <v-row no-gutters justify="center" class="my-2">
                                <v-chip small color="primary" class="">Image principale</v-chip>
                            </v-row>
                            <draggable class="" group="images" handle=".draggable" style="border: 2px dashed grey;  min-height: 150px;" v-model="frontImages">
                                <div @dragover="onDragover3" v-if="frontImages.length > 0" style="border: 2px dashed red;">
                                    <v-col cols="12" v-for="(image, index) in frontImagesList" :key="index" style="">
                                        <v-hover v-slot="{ hover }" v-if="showMainImage">
                                            <v-card
                                                min-height="140"
                                                :elevation="hover ? 12 : 2"
                                                :class="{ 'on-hover': hover }"
                                                class="d-flex justify-center align-center"
                                                style="border: 2px dashed #ccc"
                                            >
                                                <v-card-text class="text-center" style="">
                                                    <v-img :src="`/medias/${image.path}`" class="image" width="100%" style="border: 2px solid red"></v-img>
                                                </v-card-text>
                                            </v-card>
                                        </v-hover>
                                    </v-col>
                                </div>
                                <div @dragover="onDragover3" v-else>
                                    <v-col cols="12">
                                        <v-hover v-slot="{ hover }" v-if="showMainImage">
                                            <v-card height="140" :elevation="hover ? 12 : 2" :class="{ 'on-hover': hover }" class="d-flex justify-center align-center" style="border: 2px dashed #ccc">
                                                <v-card-text class="text-center" style="">
                                                    Pas d'image. Faire glisser depuis les images annexes.
                                                </v-card-text>
                                            </v-card>
                                        </v-hover>
                                    </v-col>
                                </div>
                            </draggable>
                        </v-col>
                        <v-col cols="12" md="8">
                            <v-row no-gutters justify="center" class="my-2">
                                <v-chip small color="primary" class="">Images annexes</v-chip>
                            </v-row>
                            <v-row no-gutters style="border: 2px dashed grey">
                                <draggable class="row no-gutters" group="images" handle=".draggable" v-model="backImages">
                                    <!-- <div @dragover="onDragover2"> -->
                                    <v-col cols="12" md="4" class="pa-2 draggable" v-for="(image, index) in backImagesList" :key="index">
                                        <v-hover v-slot="{ hover }">
                                            <div class="text-center">
                                                <v-img :src="`/medias/${image.path}`" width="200" class="image" style="border: 2px solid orange"></v-img>
                                                <v-btn small color="error" class="mt-2" @click="deletePortfolioImage(image)" v-if="hover">Supprimer</v-btn>
                                            </div>
                                        </v-hover>
                                    </v-col>
                                    <v-col cols="12" md="4" class="pa-2">
                                        <v-hover v-slot="{ hover }">
                                            <v-card
                                                height="140"
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
                                    <!-- </div> -->
                                </draggable>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn small color="success" type="submit" :loading="form.busy">Editer</v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
        <medias-component v-if="showMediasModal" />
    </v-main>
</template>

<script>
import Form from 'vform'
import draggable from 'vuedraggable'
import TextEditorComponent from '../../../components/TextEditorComponent'
import MediasComponent from '../../../components/MediasComponent'
export default {
    name: 'AdminPortfoliosEdit',
    components: { draggable, TextEditorComponent, MediasComponent },
    async created() {
        try {
            if (this.portfolios.length < 1) {
                await this.$store.dispatch('portfolios/fetchPortfolios')
            }
            this.form.fill(this.portfolio)
            this.backImagesList = this.form.portfolio_images.filter(image => image.is_front_image == false)
            this.frontImagesList = this.form.portfolio_images.filter(image => image.is_front_image == true)
        } catch (error) {
            console.log('error: ', error)
        }
    },
    mounted() {},
    data() {
        return {
            showHTML: false,
            showMediasModal: false,
            dialog: false,
            items: [
                {
                    text: 'Portfolios',
                    disabled: false,
                    to: '/admin/portfolios',
                    exact: true,
                    link: true
                },
                {
                    text: 'Editer',
                    disabled: true,
                    href: '/admin/portfolios'
                }
            ],
            form: new Form({
                title: '',
                description: '',
                portfolio_images: []
            }),
            backImagesList: [],
            frontImagesList: [],
            showMainImage: true
        }
    },
    computed: {
        portfolios() {
            return this.$store.getters['portfolios/portfolios']
        },
        portfolio() {
            return this.portfolios.find(portfolio => portfolio.id == this.$route.params.id)
        },
        frontImages: {
            get() {
                return this.frontImagesList
            },
            set(value) {
                console.log('frontImages set value: ', value)
                this.showMainImage = true
                const abc = this.backImagesList.some(item => value.includes(item))
                console.log('abc: ', abc)
                console.log('frontImagesList: ', this.frontImagesList)
                console.log('backImagesList: ', this.backImagesList)
                // const oldEl = value[value.length - 2]
                // const newEl = value[value.length - 1]
                const newEl = value.find(el => el != this.frontImagesList[0])
                console.log('newEl: ', newEl)
                const oldEl = value.find(el => el == this.frontImagesList[0])
                console.log('oldEl: ', oldEl)
                // console.log('newEl: ', newEl)
                this.frontImagesList = [newEl]
                if (oldEl) {
                    this.backImagesList.push(oldEl)
                }
            }
        },
        backImages: {
            get() {
                return this.backImagesList
            },
            set(value) {
                console.log('backImages set value: ', value)
                this.backImagesList = value
            }
        }
    },
    methods: {
        toggleShowHTML(value) {
            console.log('toggleShowHTML2: ', value)
            this.showHTML = value
        },
        onAddFile(file) {
            console.log('onAddFile file: ', file)
            file['is_front_image'] = false
            file['order'] = this.portfolio.portfolio_images.length
            this.dialog = false
            // console.log('portfolio.images: ', this.portfolio.portfolio_images)
            this.backImagesList.push(file)
            // console.log('portfolio.images 2: ', this.portfolio.portfolio_images)
        },
        addImage() {
            console.log('addImage')
            this.showMediasModal = true
        },
        deletePortfolioImage(image) {
            console.log('deletePortfolioImage image: ', image)
            const index = this.backImagesList.findIndex(el => el.id === image.id)
            console.log('index: ', index)
            this.backImagesList.splice(index, 1)
        },
        onEnd() {
            console.log('onEnd')
        },
        onAdd() {
            console.log('onAdd')
        },
        onUpdate() {
            console.log('onUpdate')
        },
        onStart() {
            console.log('onStart')
        },
        onChange() {
            console.log('onChange')
        },
        onDrag() {
            console.log('onDrag')
        },
        onDragover() {
            // try {
                console.log('onDragover')
                this.showMainImage = false
            // } catch (error) {
            //     console.log('error: ', error)
            // }
        },
        onDragover2() {
            try {
                console.log('onDragover2')
                this.showMainImage = true
            } catch (error) {
                console.log('error: ', error)
            }
        },
        onDragover3() {
            try {
                console.log('onDragover3')
            } catch (error) {
                console.log('error: ', error)
            }
        },
        async editPortfolio() {
            console.log('editPortfolio')
            console.log('portfolio: ', this.portfolio)
            console.log('portfolio.images: ', this.portfolio.images)
            console.log('form: ', this.form)

            // 1) Add id
            this.form.id = this.$route.params.id

            // 2) Format description
            let description
            if (!this.showHTML) {
                description = document.getElementById('textBox').innerHTML
            } else {
                description = document.getElementById('textBox').innerText
            }
            console.log('description: ', description)

            this.form['description'] = description

            // 3) Add images
            this.frontImagesList.forEach(image => {
                image.order = null
                image.is_front_image = true
            })
            this.backImagesList.forEach((image, index) => {
                image.order = index + 1
                image.is_front_image = false
            })
            const newImages = [...this.frontImagesList, ...this.backImagesList]
            console.log('newImages: ', newImages)
            this.form['portfolio_images'] = newImages

            await this.$store.dispatch('portfolios/updatePortfolio', this.form)
            this.$router.push('/admin/portfolios')
        }
    }
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
