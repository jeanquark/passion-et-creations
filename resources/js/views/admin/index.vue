<template>
    <div>
        Admin index<br />
        auth: {{ auth }}
        <!-- <router-view /> -->
    </div>
</template>

<script>
export default {
    name: 'AdminIndex',
    // middleware: ['admin'],
    async created() {
        console.log('Entered created lifecycle hook')
    },
    async mounted() {
        console.log('Entered mounted lifecycle hook')
    },
    data() {
        return {
            
        }
    },
    computed: {
        auth() {
            return this.$store.getters['auth/auth']
        },
        authUser() {
            return this.$store.getters['auth/user']
        },
    },
    methods: {
        // onToggleCollapse(collapsed) {
        //     console.log('onToggleCollapse')
        //     console.log(collapsed)
        //     this.collapsed = collapsed
        // },
    },
}
</script>

<style scoped>
.collapsed {
    margin-left: 50px;
}
.extended {
    margin-left: 350px;
}
/*>>>.v-sidebar-menu .vsm--link_level-1 .vsm--icon {
		height: 16px;
		margin-top: 6px;
	}*/
</style>