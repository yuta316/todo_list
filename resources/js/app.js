require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import ElementUI, { Calendar } from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import 'element-ui/lib/theme-chalk/display.css';
import locale from 'element-ui/lib/locale/lang/ja';
import draggable from 'vuedraggable';
//import ElInputTag from 'el-input-tag';


import HeaderComponent from "./views/layouts/HeaderComponent"
import FooterComponent from "./views/layouts/FooterComponent"
import TaskListComponent from "./views/tasks/TaskListComponent"
import TaskShowComponent from "./views/tasks/TaskShowComponent"
import TaskCreateComponent from "./views/tasks/TaskCreateComponent"
import CalendarListComponent from "./views/calendars/CalendarListComponent"

Vue.component('header-component', HeaderComponent);
Vue.component('footer-component', FooterComponent);

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
            path: '/calendar',
            name: 'calendar',
            component: CalendarListComponent,
        }
 
    ]
})

const app = new Vue({
    el: '#app',
    router,
    draggable,
});
