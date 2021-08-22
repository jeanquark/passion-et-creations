<template>
    <div>
        <h2>NoSidebar.vue</h2>
        <slot />
    </div>
</template>

<script>
export default {
    created () {
        console.log('NoSidebar layout')
    }
}
</script>

<style scoped>
</style>

