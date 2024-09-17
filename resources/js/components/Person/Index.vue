<template>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Job</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="person in people">
            <th scope="row">{{ person.id }}</th>
            <td>
                <router-link :to="{name: 'person.show', params: {id: person.id}}">{{ person.name }}</router-link>
            </td>
            <td>{{ person.age }}</td>
            <td>{{ person.job }}</td>
            <td>
                <a href="">
                <router-link class="btn btn-outline-success" style="text-decoration: none" :to="{ name: 'person.edit', params: { id: person.id } }">Edit</router-link>
                </a>
            </td>
            <td>
                <a @click = "deletePerson(person.id)" href="#" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        </tbody>
    </table>

</template>

<script>

import api from '../../api.js'
export default{
    name: 'Index',

    data(){
      return{
          people: null
      }
    },

    mounted() {
        this.getPeople()
    },

    methods: {
        getPeople(){
            api.get('/api/people')
                .then( res=> {
                  this.people = res.data.data
                })
        },

        deletePerson(id){
            api.delete(`/api/people/${id}`)
                .then(res => {
                    this.getPeople()
                })
        },

    }

}
</script>

<style scoped>

</style>
