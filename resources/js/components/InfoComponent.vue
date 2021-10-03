<template>
    <v-main class="my-0 py-0" v-if="contents.length > 0">
        <v-row no-gutters justify="center" id="info" class="my-5">
            <h2 class="text-center my-2" style="color: #c49a6c">Info</h2>
            <!-- <v-col cols="12" sm="6" md="6" class="px-4">
                <h2 class="text-center my-2" style="color: #c49a6c;">Info</h2>
                <v-card>
                    <v-card-title></v-card-title>
                    <v-card-text>
                        <iframe
                            width="100%"
                            height="300"
                            src="https://www.rts.ch/play/embed?urn=urn:rts:video:12405396&subdivisions=false"
                            allowfullscreen
                            allow="geolocation *; autoplay; encrypted-media"
                            @click="abc"
                        ></iframe>
                        <p>Participation à l'émission de la RTS "Bon débarras" diffusée le 13 août 2021 (46 min).</p>
                    </v-card-text>
                </v-card>
            </v-col> -->
        </v-row>
        <v-row no-gutters justify="center">
            <v-col cols="12" sm="6" md="5" class="pa-4" v-for="content in contents" :key="content.id">
                <!-- content: {{ content }}<br /><br /> -->
                <v-card>
                    <v-card-text>
                        <div v-html="content.content"></div>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
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
    data() {
        return {}
    },
    computed: {
        contents() {
            return this.$store.getters['contents/contents'].filter(content => content.section == 'info')
        }
    },
    methods: {
        abc () {
            console.log('abc')
        }
    }
}
</script>

<style scoped></style>
