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
            <input @click="updatePerson" type="submit" class="btn btn-primary" value="Update">
        </div>
    </div>
</template>

<script>

export default{
    name: 'Edit',

    data(){
        return{
            name: null,
            age: null,
            job: null
        }
    },

    mounted() {
        this.getPerson()
    },

    methods: {
        getPerson(){
            axios.get(`/api/people/${this.$route.params.id}`)
                .then(res => {
                    this.name = res.data.data.name
                    this.age = res.data.data.age
                    this.job = res.data.data.job

                })
        },

        updatePerson(){
            axios.patch(`/api/people/${this.$route.params.id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                  this.$router.push({name: 'person.show', params: {id: this.$route.params.id}})
                })
        }
    }



}
</script>

<style>

</style>
