/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
//import route from './route';
//import { omit } from 'lodash';
window.Vue = require('vue');
Vue.use(VueRouter);
import VueRouter from 'vue-router';
import App from './components/App';
import showStudents from './components/showStudents';
import { add } from 'lodash';
import addStudent from './components/addStudent';
import addClass from './components/addGroup';
import Vue from 'vue';
import validationErr from './components/validationErr.vue';
import alertSuccess from './components/alertSuccess'


Vue.component('alertSuccess', alertSuccess);
Vue.component('validationErr', validationErr);

const router = new VueRouter({
    mode: 'history',
    routes: [
      {
          path: "/students",
          name: 'show.students',
          component: showStudents
      },
      {
        path: "/addstudent",
        name: 'add.student',
        component: addStudent
      },
      {
        path: "/addgroup",
        name: 'add.group',
        component: addClass
      }
    ],
  });

const app = new Vue({
    el: '#app',
    components: {App},
    router,
});
