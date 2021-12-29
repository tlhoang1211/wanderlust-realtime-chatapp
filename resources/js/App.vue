/* eslint-disable */
<template>
    <div class="h-100 app-container">
        <div class="h-100 container position-relative chat-container">
            <div class="app-header clearfix">
                <router-link to="/" class="float-left" style="text-decoration: none;">
                    <h2 style="font-weight: 400; color: lawngreen">
                        WANDERLUST
                    </h2>
                </router-link>
                <div class="btn-logout float-right">
                    <a class="btn logout-cyber-btn" href="/logout"
                       onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        Logout<span aria-hidden="true">_</span>
                        <span aria-hidden="true" class="logout-cyber-btn__glitch">Logout_</span>
                        <span aria-hidden="true" class="logout-cyber-btn__tag">V11</span>
                    </a>

                    <form id="logout-form" action="/logout" method="POST" style="display: none;">
                        <input type="hidden" name="_token" :value="csrfToken">
                    </form>
                </div>
            </div>

            <transition :name="transitionName" mode="out-in" appear>
                <router-view/>
            </transition>
        </div>
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
    watch: {
        '$route.name': function (newValue, oldValue) {
            if (newValue === 'room') {
                this.transitionName = 'slide-left'
            } else {
                this.transitionName = 'slide-right'
            }
        }
    }
}
</script>

<style lang="scss">
@import "resources/sass/app.scss";
</style>
