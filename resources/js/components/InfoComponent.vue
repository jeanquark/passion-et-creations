<template>
    <v-main class="mb-10 py-0" v-if="contents.length > 0">
        <v-row no-gutters justify="center" id="info" class="">
            <h2 class="text-center my-2" style="color: #c49a6c">Info</h2>
            <!-- <v-col cols="12" sm="6" md="6" class="px-4">
                <h2 class="text-center my-2" style="color: #c49a6c;">Info</h2>
                <v-card>
                    <v-card-title></v-card-title>
                    <v-card-text @click="abc">
                        <iframe
                            width="100%"
                            height="300"
                            src="https://www.rts.ch/play/embed?urn=urn:rts:video:12405396&subdivisions=false"
                            allowfullscreen
                            allow="geolocation *; autoplay; encrypted-media"
                            id="4"
                        ></iframe>
                        <p>Participation à l'émission de la RTS "Bon débarras" diffusée le 13 août 2021 (46 min).</p>
                    </v-card-text>
                </v-card>
            </v-col> -->
        </v-row>
        <v-row no-gutters justify="center">
            <v-col cols="12" sm="6" md="5" class="pa-4" v-for="(content, index) in contents" :key="content.id">
                <v-card max-height="500" @click="openDialog(index)">
                    <v-card-text class="text-center" style="">
                        <div style="border: 0px solid lime; max-width: 100%; max-height: 450px; overflow: hidden">
                            <div v-html="content.content"></div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <v-dialog v-model="dialog" width="80%">
            <v-sheet class="text-center">
                <div v-html="selectedContent"></div>
            </v-sheet>
        </v-dialog>
    </v-main>
</template>

<script>
export default {
    async created() {
        try {
            if (this.$store.getters['contents/contents'].length < 1) {
                this.$store.dispatch('contents/fetchContents')
            }
        } catch (error) {
            console.log('error: ', error)
        }
    },
    mounted() {
        window.addEventListener(
            'blur',
            () => {
                setTimeout(() => {
                    if (document.activeElement.tagName === 'IFRAME') {
                        console.log('clicked')
                        console.log('document.activeElement.id: ', document.activeElement)
                        // Increment clicks on video
                        const element = this.contents.find((content) => content.content.includes('https://www.rts.ch/play/embed'))
                        console.log('element: ', element)
                        if (element) {
                            this.$store.dispatch('statistics/incrementCounter', {
                                section: 'info',
                                element_id: element.id,
                                element_name: element.name,
                            })
                        }
                    }
                })
            },
            { once: true }
        )
    },
    data() {
        return {
            dialog: false,
            selectedContent: null,
        }
    },
    computed: {
        contents() {
            return this.$store.getters['contents/contents'].filter((content) => content.section == 'info' && content.is_published == true)
        },
    },
    methods: {
        openDialog(index) {
            try {
                console.log('openDialog')
                this.dialog = true
                this.selectedContent = this.contents[index]['content']
            } catch (error) {
                console.log('error: ', error)
            }
        },
    },
}
</script>

<style scoped>
</style>
