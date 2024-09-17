import { createApp } from 'vue';
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/main', component: () => import('./components/Person/Main.vue'),
        name: 'person.main'
    },
    {
        path: '/people', component: () => import('./components/Person/Index.vue'),
        name: 'person.index'
    },
    {
        path: '/people/create', component: () => import('./components/Person/Create.vue'),
        name: 'person.create'
    },
    {
        path: '/people/:id/edit', component: () => import('./components/Person/Edit.vue'),
        name: 'person.edit'
    },
    {
        path: '/people/:id', component: () => import('./components/Person/Show.vue'),
        name: 'person.show'
    },
    {
        path: '/users/registration', component: () => import('./components/User/Registration.vue'),
        name: 'user.registration'
    },
    {
        path: '/users/login', component: () => import('./components/User/Login.vue'),
        name: 'user.login'
    },
    {
        path: '/users/profile', component: () => import('./components/User/Profile.vue'),
        name: 'user.profile'
    },

    {
        path: '/:pathMatch(.*)*', component: () => import('./components/User/Profile.vue'),
        name: '404'
    },
]

const router =createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {

    const accessToken = localStorage.getItem('access_token')


    if(!accessToken){
        if(to.name === 'user.login' || to.name === 'user.registration'){
            return next()
        }else{
            return next({
                name: 'user.login'
            })
        }
    }




    if ((to.name === 'user.login' || to.name === 'user.registration') && accessToken){
        return next({
            name:'user.profile'
        })
    }

    next()
})


export default router;
