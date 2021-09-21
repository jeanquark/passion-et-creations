<template>
    <v-main>
        <v-breadcrumbs large :items="items"></v-breadcrumbs>
        <div v-if="portfolio">
            <!-- <h2>Éditer portfolio {{ $route.params.id }}</h2> -->
            <!-- portfolio: {{ portfolio }} -->
            <!-- portfolio.images: {{ portfolio.image }}<br /><br /> -->
        </div>

        <v-dialog v-model="dialog" width="800">
            <medias-component @addFile="onAddFile"></medias-component>
        </v-dialog>
        <v-card class="mx-4 pa-2" v-if="portfolio">
            portfolio.portfolio_images.length: {{ portfolio.portfolio_images.length }}<br /><br />
            <v-form @submit.prevent="editPortfolio">
                <!-- <v-card-title>{{ portfolio.title }}</v-card-title> -->
                <v-card-text>
                    <v-row no-gutters class="my-4">
                        <v-col cols="12">
                            <v-text-field label="Titre" v-model="portfolio.title"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <text-editor-component @toggleShowHTML="toggleShowHTML" :formContent="portfolio.description" />
                        </v-col>
                    </v-row>
                    <v-row no-gutters align="start" class="my-4">
                        <v-col cols="12" md="4" style="border: 2px solid pink">
                            <v-row no-gutters justify="center" class="my-2">
                                <v-chip small color="primary" class="">Image principale</v-chip>
                            </v-row>
                            <v-row no-gutters justify="center" class="my-0 pa-0">
                                <!-- <draggable class="list-group" group="people" style="width: 100%; border: 2px dashed green"> -->
                                <!-- <v-col cols="12"> -->
                                <v-img :src="`/medias/${frontImage(portfolio.portfolio_images)['path']}`" width="100%" class="image" style="border: 1px solid red"></v-img>
                                <!-- </v-col> -->
                                <!-- </draggable> -->
                            </v-row>
                        </v-col>
                        <v-col cols="12" md="8" style="border: 2px solid orange">
                            <v-row no-gutters justify="center" class="my-2">
                                <v-chip small color="primary" class="">Images annexes</v-chip>
                            </v-row>
                            <v-row no-gutters justify="start" class="my-2">
                                <draggable class="list-group2" group="people2" @start="drag = true" @end="drag = false" v-model="backImages">
                                    <v-col cols="12" md="4" class="pa-2" v-for="image in backImages" :key="image.id">
                                        {{ image.name }}
                                        <v-img :src="`/medias/${image.path}`" width="200" class=""></v-img>
                                    </v-col>
                                </draggable>
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
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn small color="success" type="submit">Editer</v-btn>
                </v-card-actions>
            </v-form>
            <v-row no-gutters class="my-5" style="border: 1px solid blue">
                <v-col cols="6">
                    <h3>Draggable 1</h3>
                    <draggable class="list-group" :list="list1" group="people" @change="log" :draggable="[]">
                        <div class="list-group-item" v-for="(element, index) in list1" :key="element.name">{{ element.name }} {{ index }}</div>
                    </draggable>
                </v-col>

                <v-col cols="6">
                    <h3>Draggable 2</h3>
                    <draggable class="list-group" :list="list2" group="people" @change="log">
                        <div class="list-group-item" v-for="(element, index) in list2" :key="element.name">{{ element.name }} {{ index }}</div>
                    </draggable>
                </v-col>
            </v-row>
            <v-row no-gutters class="my-5" style="border: 1px solid grey">
                <v-col cols="6">
                    <h3>Draggable 3</h3>
                    <draggable class="list-group" group="people2" @end="onEnd" @add="onAddList3" @change="log" @update="onUpdate" v-model="list3" draggable="[]">
                        <div class="list-group-item" v-for="element in list3_2" :key="element.name">{{ element.name }}</div>
                    </draggable>
                </v-col>

                <v-col cols="6">
                    <h3>Draggable 4</h3>
                    <draggable class="list-group" group="people2" @end="onEnd" @add="onAdd" @change="log" v-model="list4">
                        <div class="list-group-item" v-for="element in list4_2" :key="element.name">{{ element.name }}</div>
                    </draggable>
                </v-col>
            </v-row>
        </v-card>
        <medias-component v-if="showMediasModal" />
    </v-main>
</template>

<script>
import draggable from 'vuedraggable'
import TextEditorComponent from '../../../components/TextEditorComponent'
import MediasComponent from '../../../components/MediasComponent'
export default {
    name: 'AdminPortfoliosEdit',
    components: { draggable, TextEditorComponent, MediasComponent },
    async created() {
        // if (this.portfolios.length < 1) {
        await this.$store.dispatch('portfolios/fetchPortfolios')
        // }
    },
    mounted () {
        this.list3_2 = [{ name: 'list3_1', id: 1 }]
    },
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
                    link: true,
                },
                {
                    text: 'Editer',
                    disabled: true,
                    href: '/admin/portfolios',
                },
            ],
            list1: [
                { name: 'John', id: 1 },
                { name: 'Joao', id: 2 },
                { name: 'Jean', id: 3 },
                { name: 'Gerard', id: 4 },
            ],
            list2: [
                { name: 'Juan', id: 5 },
                { name: 'Edgard', id: 6 },
                { name: 'Johnson', id: 7 },
            ],
            // list3: [
            //     { name: 'list3_1', id: 1 },
            //     { name: 'list3_2', id: 2 },
            //     { name: 'list3_3', id: 3 },
            //     { name: 'list3_4', id: 4 },
            // ],
            // list4: [
            //     { name: 'list4_1', id: 5 },
            //     { name: 'list4_2', id: 6 },
            //     { name: 'list4_3', id: 7 },
            // ]
            list3_2: [],
            list4_2: [],
        }
    },
    computed: {
        portfolios() {
            return this.$store.getters['portfolios/portfolios']
        },
        portfolio() {
            return this.portfolios.find((portfolio) => portfolio.id == this.$route.params.id)
        },
        backImages: {
            get() {
                return this.portfolio.portfolio_images.filter((image) => image.is_front_image == false)
            },
            set(value) {
                console.log('set backImages: ', value)
                // this.$store.commit('portfolios/SET_PORTFOLIOS', value)
                // this.portfolios = value
                // this.portfolio.images = value
            },
        },
        // list3() {
        //     return [
        //         { name: 'list3_1', id: 1 },
        //         { name: 'list3_2', id: 2 },
        //         { name: 'list3_3', id: 3 },
        //         { name: 'list3_4', id: 4 },
        //     ]
        // },
        list3: {
            get() {
                // this.list3_2 = [{ name: 'list3_1', id: 1 }]
                // return [{ name: 'list3_1', id: 1 }]
                return this.list3_2
            },
            set(value) {
                console.log('list3 set value: ', value)
                // console.log('list3 set value: ', value)
                // this.list3_2 = value
                // this.list4_2 = []
                // return this.list3.push(value)
                // this.list3 = value
                // this.list3.push({
                //     name: 'list3_new',
                //     id: 8,
                // })
            },
        },
        // list4() {
        //     return [
        //         { name: 'list4_1', id: 5 },
        //         { name: 'list4_2', id: 6 },
        //         { name: 'list4_3', id: 7 },
        //     ]
        // },
        list4: {
            get() {
                this.list4_2 = [
                    { name: 'list4_1', id: 5 },
                    { name: 'list4_2', id: 6 },
                    { name: 'list4_3', id: 7 },
                    { name: 'list4_4', id: 8 },
                    { name: 'list4_5', id: 9 },
                ]
                // return [
                //     { name: 'list4_1', id: 5 },
                //     { name: 'list4_2', id: 6 },
                //     { name: 'list4_3', id: 7 },
                //     { name: 'list4_4', id: 8 },
                //     { name: 'list4_5', id: 9 },
                // ]
            },
            set(value) {
                console.log('list4 set value: ', value)
                // this.list4_2 = []
                this.list4_2 = value
                // this.list4 = value
            },
        },
    },
    methods: {
        toggleShowHTML(value) {
            console.log('toggleShowHTML2: ', value)
            this.showHTML = value
        },
        frontImage(images) {
            return images.find((image) => image.is_front_image == true)
        },
        backImages(images) {
            return images.filter((image) => image.is_front_image == false)
        },
        onAddFile(file) {
            console.log('onAddFile file: ', file)
            file.is_front_image = false
            this.dialog = false
            console.log('portfolio.images: ', this.portfolio.images)
            this.portfolio.images.push(file)
            console.log('portfolio.images 2: ', this.portfolio.images)
        },
        addImage() {
            console.log('addImage')
            this.showMediasModal = true
        },
        deleteImage(image) {
            console.log('deleteImage image: ', image)
        },
        restoreImage(image) {
            console.log('restoreImage image: ', image)
        },
        editPortfolio() {
            console.log('editPortfolio')
            console.log('portfolio: ', this.portfolio)
            console.log('portfolio.images: ', this.portfolio.images)
        },
        log(evt) {
            console.log(evt)
            const { added, removed } = evt
            if (added) {
                console.log('evt.added.element: ', added.element)
            }
            if (removed) {
                console.log('evt.removed.element: ', removed.element)
            }
        },
        onChangeList3(e) {
            console.log('onChangeList3 e: ', e)
        },
        changeList4(e) {
            console.log('changeList4 e: ', e)
            console.log('changeList4 e.moved: ', e.moved)

            if (e.moved.newIndex > e.moved.oldIndex) {
                console.log('newIndex > oldIndex')
                
            } else {
                console.log('newIndex < oldIndex')
                // for (let i = e.moved.newIndex; i++; i < this.list4.length) {
                //     this.list4[i] = this.list4[i + 1]
                // }
            }
            // this.list4[e.moved.oldIndex] = null
            // this.list4[e.moved.newIndex] = e.moved.element
        },
        handleMove(e) {
            console.log('handleMove e:', e)
            console.log('e: ', e.draggedContext.element)
            this.list3.push(e.draggedContext.element)
            // return true
        },
        handleDragEnd() {
            console.log('handleDragEnd')
        },
        onChange(evt) {
            console.log('onChange evt: ', evt)
            // this.list3 = []
        },
        onAdd(e) {
            console.log('onAdd e: ', e)
            // this.list3_2 = []
            // this.list4_2 = []
        },
        onAddList3(e) {
            console.log('onAddList3 e: ', e)
            console.log('list3_2: ', this.list3_2)
            console.log('list3: ', this.list3)
            // this.list3_2 = []
        },
        onUpdate(e) {
            console.log('onUpdate e: ', e)
        },
        onEnd(e) {
            console.log('onEnd e: ', e)
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
