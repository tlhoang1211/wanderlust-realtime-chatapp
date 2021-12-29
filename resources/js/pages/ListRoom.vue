<template>
    <div class="row justify-content-center h-100">
        <div class="col-md-8 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header">
                    <h2 class="d-flex room-header">Chatroom<span
                        class="badge ml-2 badge-custom">{{
                            $root.rooms.length
                        }}</span></h2>
                    <div class="input-group">
                        <input v-model="searchQuery" type="text" placeholder="Search..." name=""
                               class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    <ul class="contacts">
                        <li
                            v-for="room in filteredRooms"
                            :key="room.id"
                        >
                            <router-link :to="`/rooms/${room.id}`">
                                <div class="d-flex bd-highlight">
                                    <div class="user_info">
                                        <span style="font-size: 25px; color: #FFF01F">{{
                                                room.name
                                            }}</span>
                                        <p v-if="room.description"
                                           style="font-size: 15px">
                                            {{ room.description }}</p>
                                    </div>
                                </div>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            searchQuery: ''
        }
    },
    computed: {
        filteredRooms() {
            const searchQueryClean = this.searchQuery.trim().toLowerCase()
            return this.$root.rooms.filter(item => item.name.toLowerCase().includes(searchQueryClean))
        }
    }
}
</script>

<style lang="scss">
.room-header {
    color: lawngreen;
}

.badge-custom {
    background-color: #FFF01F;
    color: black;
}

.fa-search:before {
    color: lawngreen;
}

li:hover, li:focus {
    text-decoration: unset !important;
    background-color: rgba(255, 255, 255, 0.2) !important;
}

.chat .card {
    background-color: rgba(0, 0, 0, 0.7) !important;
}

.chat .card .card-header {
    border-bottom: 1px solid rgba(255, 255, 255, 0.5) !important;
}

.chat .card .card-header .search {
    background-color: rgba(255, 255, 255, 0.2) !important;
}

.chat .card .card-header .search_btn {
    background-color: rgba(255, 255, 255, 0.1) !important;
}

a:hover {
    text-decoration: none !important;
}
</style>
