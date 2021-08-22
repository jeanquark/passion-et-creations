<template>
    <div>
        <h2>Frontend</h2>
        <child />
    </div>
</template>

<script>
export default {
    name: 'frontend',
    components: {},
    async created() {
        console.log('Using frontend layout!')
    },
    mounted() {},
    data() {
        return {}
    },
    computed: {
    },
    methods: {}
}
</script>

<style scoped>

</style>
