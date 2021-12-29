/* eslint-disable */
<template>
    <div class="h-100 app-container">

        <Footer/>
    </div>
</template>

<script>
import Footer from './components/Footer'

export default {
    components: {
        Footer
    },
    data() {
        return {
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
            transitionName: 'fade'
        }
    },

}
</script>

<style lang="scss">
@import "resources/sass/app.scss";
</style>
