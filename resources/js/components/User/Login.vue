<template>
    <div class="w-25">
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="Email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="Password">
        <div v-if="error" class="text-danger mb-3">{{this.error}}</div>
        <input @click.prevent = "login" type="submit" class="btn btn-primary">
    </div>
</template>
<script>
export default{
    name: 'Login',
    data(){
        return {
            email: null,
            password: null,
            error: null
        }
    },
    methods: {
        login(){
            axios.post('/api/auth/login', {email: this.email, password: this.password})
                .then(res => {
                    localStorage.access_token = res.data.access_token
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
