<template>
    <div class="w-50">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" v-model="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" v-model="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input :disabled="!isDisabled" @click="store" type="submit" class="btn btn-primary" value="Add">
        </div>
    </div>
</template>

<script>

    export default{
        name: 'Create',

        data(){
            return{
                name: null,
                age: null,
                job: null
            }
        },

        methods: {
            store(){
                axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                    .then(res=>{
                        this.$router.push({name: 'person.index'})
                    })
            },

        },

        computed: {
            isDisabled(){
                return this.name && this.age && this.job
            }
        }

    }
</script>

<style scoped>

</style>
