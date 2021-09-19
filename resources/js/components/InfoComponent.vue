<template>
    <v-row no-gutters justify="center" id="info" class="my-5">
        <v-col cols="12" sm="6" md="6" class="px-4">
            <h2 class="text-center my-2" style="color: #c49a6c;">Info</h2>
            <v-card>
                <v-card-title></v-card-title>
                <v-card-text>
                    <iframe width="100%" height="300" src="https://www.rts.ch/play/embed?urn=urn:rts:video:12405396&subdivisions=false" allowfullscreen allow="geolocation *; autoplay; encrypted-media"></iframe>
                    <p>Participation à l'émission de la RTS "Bon débarras" diffusée le 13 août 2021 (46 min).</p>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>
export default {
    data() {
        return {}
    },
    computed: {
        content () {
              return []
        }
    },
    methods: {}
}
</script>

<style scoped></style>
