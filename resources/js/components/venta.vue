<template>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        Total: {{total}} Bs.
                        <button @click="reset" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>
                        <button @click="guardar" class="btn btn-success btn-sm"><i class="fa fa-save"></i></button>
                    </h3>
                    <!--            <pre>{{ventas}}</pre>-->
                    <h4>COMIDAS</h4>
                </div>
                <div v-for="i in datos" class="col-md-2" v-if="i.tipo=='COMIDA'">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation" style="
                    background-size: 100% 100%;
                    background-repeat: no-repeat;
                    "
                                 v-bind:style="{ backgroundImage: 'url(' + i.photo + ')' }"
                            >
                                <div style="color: white;background: rgba(0,0,0,0.5)">{{i.nombre}}</div>
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Bs {{i.precio}}
                                </span>
<!--                                                        <div class="text-muted">Disponib: <b>{{i.cantidad}}</b></div>-->
<!--                                                        <div class="text-muted">Vendidos: <b>{{i.sale.length}}</b></div>-->
<!--                                                        <div class="text-muted">En Bolivi.: <b><label v-for="i in i.ventas">{{i.total}}</label></b></div>-->
                                <!--                                                <div class="text-muted">Bs. {{i.ventas[0]}}</div>-->
                                <!--                                                <a href="#" class="product-name"> Product</a>-->
                                <div class="small m-t-xs" style="padding: 0px;margin:0px;border: 0px">
<!--                                    <div class="text-muted">Disponib: <b>{{i.cantidad}}</b></div>-->
<!--                                    <div class="text-muted">Vendidos: <b>{{i.sale.length}}</b></div>-->
<!--                                    <div class="text-muted">En Bolivi.: <b><label v-for="i in i.ventas">{{i.total}}</label></b></div>-->
                                </div>
                                <div class="text-center">
                                    <!--                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>-->
                                    <!--                            <button @click="vender(i)" class="btn btn-primary btn-block"> <i class="fa fa-money"></i> Agregar</button>-->
                                    <button @click="mas(i)" class="btn btn-success "> <i class="fa fa-plus-circle"></i> </button>
                                    <button @click="menos(i)" class="btn btn-danger "> <i class="fa fa-minus-circle"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>BEBIDAS</h4>
                </div>
                <div v-for="i in datos" class="col-md-2" v-if="i.tipo=='BEBIDA'">
                    <div class="ibox">
                        <div class="ibox-content product-box">
                            <div class="product-imitation" style="
                    background-size: 100% 100%;
                    background-repeat: no-repeat;
                    padding: 35px"
                                 v-bind:style="{ backgroundImage: 'url(' + i.photo + ')' }"
                            >
                                <div style="color: white;background: rgba(0,0,0,0.5)">{{i.nombre}}</div>
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    Bs {{i.precio}}
                                </span>
                                <!--                        <div class="text-muted">Disponib: <b>{{i.cantidad}}</b></div>-->
                                <!--                        <div class="text-muted">Vendidos: <b>{{i.sale.length}}</b></div>-->
                                <!--                        <div class="text-muted">En Bolivi.: <b><label v-for="i in i.ventas">{{i.total}}</label></b></div>-->
                                <!--                                                <div class="text-muted">Bs. {{i.ventas[0]}}</div>-->
                                <!--                                                <a href="#" class="product-name"> Product</a>-->
                                <div class="small m-t-xs" style="padding: 0px;margin:0px;border: 0px">
                                    <!--                                    <div class="text-muted">Disponib: <b>{{i.cantidad}}</b></div>-->
                                    <!--                                    <div class="text-muted">Vendidos: <b>{{i.sale.length}}</b></div>-->
                                    <!--                                    <div class="text-muted">En Bolivi.: <b><label v-for="i in i.ventas">{{i.total}}</label></b></div>-->
                                </div>
                                <div class="text-center">
                                    <!--                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>-->
                                    <!--                            <button @click="vender(i)" class="btn btn-primary btn-block"> <i class="fa fa-money"></i> Agregar</button>-->
                                    <button @click="mas(i)" class="btn btn-success "> <i class="fa fa-plus-circle"></i> </button>
                                    <button @click="menos(i)" class="btn btn-danger "> <i class="fa fa-minus-circle"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <h3>Productos</h3>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                <tr v-for="(i,index) in ventas" :key="index">
                    <td>{{index+1}}</td>
                    <td>{{i.nombre}}</td>
                    <td>{{i.precio}}</td>
                    <td>{{i.cantidad}}</td>
                    <td>{{i.cantidad*i.precio}} Bs.</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{{total}} Bs.</td>
                </tr>
            </table>
<!--            <label v-for="i in ventas">{{i.nombre}} {{i.precio}}Bs</label>-->
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
            ventas:[]
        }
    },
    methods:{
        mas(i){

            const index=this.ventas.findIndex(item=>item.id===i.id);
            if (index==-1){
                i.cantidad=1;
                this.ventas.push(i);
            }else{
                this.ventas[index].cantidad=this.ventas[index].cantidad+1;
                // console.log(this.ventas[index].cantidad+1);
            }


            // if(this.ventas.length==0){
            //     i.cantidad=1;
            //     this.ventas.push(i);
            //     return false;
            // }else{
            //     let cont=0;
            //     this.ventas.forEach(r=>{
            //         // console.log(r.id==i.id);
            //         if (r.id==i.id){
            //             // this.ventas.splice(cont,1);
            //             r.cantidad=r.cantidad+1;
            //             this.ventas[cont]=r;
            //             return false;
            //         }
            //         cont++;
            //     })
            //     i.cantidad=1;
            //     this.ventas.push(i);
            //     return false;
            // }


            // this.dato={};
            // $('#crear').modal('show');
            // axios.post('/sale',{product_id:i.id,precio:i.precio}).then(res=>{
            //     // this.datos=res.data;
            //     // console.log(this.datos);
            //     this.$toast.open({
            //         message: "Agregado correctamente",
            //         type: "success",
            //         duration: 3000,
            //         dismissible: true
            //     });
            //     this.misdatos();
            // });
        },
        reset(){
            this.ventas=[];
        },
        guardar(){
            axios.post('/sales',{ventas:this.ventas}).then(res=>{
                // this.datos=res.data;
                console.log(res.data);
                this.$toast.open({
                    message: "Agregado correctamente",
                    type: "success",
                    duration: 3000,
                    dismissible: true
                });
                // this.misdatos();
                this.ventas=[];
            });
        },
        menos(i){
            // console.log(i)
            // let cont=0;
            // this.ventas.findIndex(item=>{
            //     cont++;
            //     console.log(item.id==i.id);
            //     if(item.id==i.id){
            //
            //         // console.log(cont);
            //         this.ventas.splice(cont,1);
            //         return false;
            //     }
            //
            // });
            // console.log(index);
            // this.ventas.forEach(r=>{
            //     // console.log(r.id==i.id);
            //     if (r.id==i.id){
            //         this.ventas.splice(cont,1);
            //         return false;
            //     }
            //     cont++;
            // })

            const index=this.ventas.findIndex(item=>item.id===i.id);
            if (index==-1){
                // i.cantidad=1;
                // this.ventas.push(i);
            }else{
                this.ventas[index].cantidad=this.ventas[index].cantidad-1;
                if (this.ventas[index].cantidad==0){
                    this.ventas.splice(index,1);
                    return false;
                }
                // console.log(this.ventas[index].cantidad+1);
            }


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
            this.ventas.forEach(r=>{
                // console.log(r.ventas);
                // if (r.ventas.length==1){
                    // console.log(r.ventas[0].total);
                    t+= parseInt(r.precio)*parseInt(r.cantidad);
                // }
                // t+=
            })
            return t;
        }

    }
}
</script>




