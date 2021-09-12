// require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueSimpleAlert from "vue-simple-alert";
import 'sweetalert2/src/sweetalert2.scss'
Vue.use(VueSimpleAlert);

Vue.use(require('vue-moment'));

import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)

import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';




Vue.use(VueToast);

import home from './components/home';
import products from './components/products';
import sales from './components/sales';
import reporte from './components/reporte';
import venta from './components/venta';
import reserva from './components/reserva';
import inventario from "./components/inventario";

const routes = [
    { path: '/home', component: home },
    { path: '/reserva', component: reserva },
    { path: '/products', component: products },
    { path: '/sales', component: sales },
    { path: '/venta', component: venta },
    { path: '/reporte', component: reporte },
    { path: '/inventarios', component: inventario },
]
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

import axios from 'axios';
const app = new Vue({
    router,
    methods:{
        vaciar(){
            // console.log('aa');
            this.$fire({
                title: "Seguro?",
                text: "Eliminar toda la base de datos?",
                type: "warning",
                timer: 3000,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SI'
            }).then(r => {
                // console.log(r.value);
                if(r.value){
                    axios.delete('/sales/1').then(res=>{
                        this.$fire({
                            title: "Eliminado",
                            text: "correctamente",
                            type: "success",
                            timer: 3000
                        })
                    })
                }
            });

        }
    }
}).$mount('#app')
