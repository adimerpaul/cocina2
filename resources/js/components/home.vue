<template>
    <div class="row">
        <div class="col-lg-3" v-for="i in datos">
            <div class="ibox ">
                <div class="ibox-title">
<!--                    <span class="label label-success float-right">Fecha</span>-->
                    <h5>{{ i.dia }} </h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{i.total}} Bs</h1>
                    <div class="stat-percent font-bold text-success">{{i.date}} <i class="fa fa-bolt"></i></div>
                    <small>Total {{i.total}} Bs</small>
                </div>
            </div>
        </div>
<!--        <div class="col-lg-3">-->
<!--            <div class="ibox ">-->
<!--                <div class="ibox-title">-->
<!--                    <span class="label label-info float-right">Annual</span>-->
<!--                    <h5>Orders</h5>-->
<!--                </div>-->
<!--                <div class="ibox-content">-->
<!--                    <h1 class="no-margins">275,800</h1>-->
<!--                    <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>-->
<!--                    <small>New orders</small>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-3">-->
<!--            <div class="ibox ">-->
<!--                <div class="ibox-title">-->
<!--                    <span class="label label-primary float-right">Today</span>-->
<!--                    <h5>visits</h5>-->
<!--                </div>-->
<!--                <div class="ibox-content">-->
<!--                    <h1 class="no-margins">106,120</h1>-->
<!--                    <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>-->
<!--                    <small>New visits</small>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-3">-->
<!--            <div class="ibox ">-->
<!--                <div class="ibox-title">-->
<!--                    <span class="label label-danger float-right">Low value</span>-->
<!--                    <h5>User activity</h5>-->
<!--                </div>-->
<!--                <div class="ibox-content">-->
<!--                    <h1 class="no-margins">80,600</h1>-->
<!--                    <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>-->
<!--                    <small>In first month</small>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
export default {
    mounted() {
        moment.locale('es');

        // console.log('Component mounted.')
        axios.get('historial').then(res=>{

            // this.datos=res.data;
            res.data.forEach(r=>{
                let date = moment( r.date);
                // console.log(date.format('dddd, MMMM DD YYYY'));
                this.datos.push({date:r.date,total:r.total,dia:date.format('dddd')})
            })
        })

    },
    data(){
        return {
            datos:[]
        }
    }
}
</script>




