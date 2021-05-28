require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'element-ui/lib/theme-chalk/display.css';
import locale from 'element-ui/lib/locale/lang/ja';
import draggable from 'vuedraggable';
//import ElInputTag from 'el-input-tag';


import HeaderComponent from "./components/HeaderComponent"
import TaskListComponent from "./components/TaskListComponent"
import TaskShowComponent from "./components/TaskShowComponent"
import TaskCreateComponent from "./components/TaskCreateComponent"
import TaskEditComponent from "./components/TaskEditComponent"

Vue.component('header-component', HeaderComponent);

Vue.use(VueRouter);
Vue.use(ElementUI, { locale });

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/tasks',
            name: 'task.list',
            component: TaskListComponent

        },
        {
            path: '/tasks/:taskId',
            name: 'task.show',
            component: TaskShowComponent,
            props: true,
        },
        {
            path: 'tasks/create',
            name: 'task.create',
            component: TaskCreateComponent,
        },
        {
            path: 'tasks/:taskId/edit',
            name: 'task.edit',
            component: TaskEditComponent,
            props: true,
        },
 
    ]
})

const app = new Vue({
    el: '#app',
    router,
    draggable,
});
