<template>

    <div class="m-3">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <router-link class="homeLink text-decoration-none" :to="{ name: 'person.main' }">Home</router-link></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="">
                            <router-link class = "links text-decoration-none" :to="{ name: 'person.index' }">People</router-link>
                        </a>
                        <a class="nav-link" href="">
                            <router-link class="links text-decoration-none" :to="{ name: 'person.create' }">Add</router-link>
                        </a>
                        <a class="nav-link" v-if="!access_token" href="">
                            <router-link class="links text-decoration-none" :to="{ name: 'user.registration' }">Sign up</router-link>
                        </a>
                        <a class="nav-link" v-if="!access_token" href="">
                            <router-link class="links text-decoration-none" :to="{ name: 'user.login' }">Log in</router-link>
                        </a>
                        <a class="nav-link" href="">
                            <router-link v-if="access_token" class="links text-decoration-none" :to="{ name: 'user.profile' }">Profile</router-link>
                        </a>
                        <a class="nav-link" href="" v-if="access_token" @click.prevent ="logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>


        <div>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import api from "../api.js";
    export default {
        name: 'Index',

        data(){
            return {
                access_token: null
            }
        },

        mounted() {
            this.getAccessToken()
        },

        updated() {
            this.getAccessToken()
        },

        methods: {
            getAccessToken(){
                this.access_token = localStorage.getItem('access_token')
            },
            logout(){
                api.post('/api/logout')
                    .then(res => {
                        localStorage.removeItem('access_token');
                        this.$router.push({name: 'user.login'})
                            .then(() => {
                                window.location.reload();
                            })
                    })
            },
        }
    }

</script>

<style scoped>

.homeLink{
    color: black;
}

.navbar{
    background-color: #6ea8fe;
    border-radius: 10px;
}

.nav-link{
    text-decoration: none;
    margin-right: 10px;
    margin-left: 10px;
}

.isActive{
    color: black;
    opacity: 1;
}

</style>
