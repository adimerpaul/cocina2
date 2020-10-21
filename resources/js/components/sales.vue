<template>
    <div class="row">
        <div class="col-md-12">
            <h3>Total de ventas del dia: {{total}} Bs.</h3>
        </div>
        <div v-for="i in datos" class="col-md-2">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-imitation" style="
                    background-size: 100% 100%;
                    background-repeat: no-repeat;"
                    v-bind:style="{ backgroundImage: 'url(' + i.photo + ')' }"
                    >
                        <div style="color: white;background: rgba(0,0,0,0.5)">{{i.nombre}}</div>
                    </div>
                    <div class="product-desc">
                                <span class="product-price">
                                    Bs {{i.precio}}
                                </span>
                        <div class="text-muted">Disponibles {{i.cantidad}}</div>
                        <div class="text-muted">Vendidos {{i.sale.length}}</div>
                        <div class="text-muted">Bs. <label v-for="i in i.ventas">{{i.total}}</label></div>

<!--                        <div class="text-muted">Bs. {{i.ventas[0]}}</div>-->
<!--                        <a href="#" class="product-name"> Product</a>-->
<!--                        <div class="small m-t-xs">-->
<!--                            Many desktop publishing packages and web page editors now.-->
<!--                        </div>-->
                        <div class="m-t text-righ">
<!--                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>-->
                            <button @click="vender(i)" class="btn btn-primary btn-block"> <i class="fa fa-money"></i> Agregar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    mounted() {
        this.misdatos();
    },
    data:function (){
        return {
            datatable:null,
            datos:[],
            dato:{},
            // products:[],
        }
    },
    methods:{
        vender(i){
            // this.dato={};
            // $('#crear').modal('show');
            axios.post('/sale',{product_id:i.id,precio:i.precio}).then(res=>{
                // this.datos=res.data;
                // console.log(this.datos);
                this.$toast.open({
                    message: "Agregado correctamente",
                    type: "success",
                    duration: 3000,
                    dismissible: true
                });
                this.misdatos();
            });
        },
        misdatos(){
            axios.get('/productSale').then(res=>{
                this.datos=res.data;
                // console.log(this.datos);
            });
        },
        // vendidos:async function (i){
        //     await axios.get('/sale/'+i.id).then(async res=>{
        //         // console.log(res.data.length)
        //          return await res.data.length;
        //     })
        // }
    },
    computed:{
        reg:function (){
            // console.log(this.dato.password);
            if (this.dato.password=='' || this.dato.password==this.dato.password2)
                return false;
            else
                return true;
        },
        total:function (){
            let t=0;
            this.datos.forEach(r=>{
                // console.log(r.ventas);
                if (r.ventas.length==1){
                    // console.log(r.ventas[0].total);
                    t+=r.ventas[0].total;
                }
                // t+=
            })
            return t;
        }

    }
}
</script>




