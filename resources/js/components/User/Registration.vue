<template>
    <div class="w-25">
        <input v-model="name" type="text" class="form-control mt-3 mb-3" placeholder="Name">
        <input v-model="email" type="email" class="form-control mb-3" placeholder="Email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="Password">
        <input v-model="password_confirmation" type="password" class="form-control mb-3" placeholder="Confirm password">
        <div v-if="error" class="text-danger mb-3">{{error}}</div>
        <input @click.prevent="store" type="submit" class="btn btn-primary">
    </div>
</template>
<script>
export default{
    name: 'Registration',

    data(){
        return{
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            error: null
        }
    },

    mounted(){

    },

    methods: {
        store(){
            axios.post('/api/users', {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation})
                .then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({name: 'user.profile'})
                        .then(() => {
                            window.location.reload();
                        })
                })
                .catch(error => {
                    this.error = error.response.data.error
                })
        }
    }

}
</script>
<style></style>
