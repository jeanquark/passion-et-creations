<template>
    <v-main>
        <medias-component @addFile="onAddFile" />
    </v-main>
</template>

<script>
import MediasComponent from '../../../components/MediasComponent'
export default {
    name: 'AdminMediasIndex',
    components: { MediasComponent },
    async created() {

    },
    data() {
        return {

        }
    },
    computed: {

    },
    methods: {
        onAddFile () {
            console.log('onAddFile')
        }
    },
}
</script>

<style scoped>

</style>
