<template>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        Total: {{total}} Bs.
                        <button @click="reset" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> Reset</button>
                        Total del dia : {{totale}} Bs.
<!--                        <button @click="guardar" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Vender</button>-->
                        <form @submit.prevent="reservar">
                            <div class="form-group row">
                                <label for="familia" class="col-sm-1 col-form-label">Familia</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="familia" placeholder="Familia" v-model="familia">
                                </div>
                                <label for="celular" class="col-sm-1 col-form-label">Celular</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="celular" placeholder="Celular" v-model="celular">
                                </div>
                                <label for="dir" class="col-sm-1 col-form-label">Direc.</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="dir" placeholder="Direc." v-model="dir">
                                </div>
                                <label for="obs" class="col-sm-1 col-form-label">Obser.</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="obs" placeholder="Obser." v-model="obs">
                                </div>
                                <label for="hora" class="col-sm-1 col-form-label">Hora.</label>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" id="hora"  placeholder="Obser." v-model="hora">
                                </div>

                                <label for="tipo1" class="col-sm-1 col-form-label">Tipo</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="tipo1" value="RESTAURANT" v-model="tipo">
                                        <label class="form-check-label" for="tipo1">
                                            RESTAURANT
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipo2" value="ENVIAR" v-model="tipo">
                                        <label class="form-check-label" for="tipo2">
                                            ENVIAR
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipo" id="tipo3" value="RECOGER" v-model="tipo" >
                                        <label class="form-check-label" for="tipo3">
                                            RECOGER
                                        </label>
                                    </div>
                                </div>
                                <label for="delivery" class="col-sm-2 col-form-label">Delivery</label>
                                <div class="col-sm-5">
                                    <select name="de" id="delivery" v-model="delivery" class="form-control">
                                        <option v-for="(delivery,index) in deliveries" :key="index" :value="delivery.id">{{delivery.nombre}}</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class=" btn-block btn btn-primary btn-sm"><i class="fa fa-cog"></i> Reservar</button>
                                </div>
                            </div>
                        </form>
<!--                        <form>-->
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-3">-->
<!--                                    <label for="familia">Familia</label>-->
<!--                                    <input type="text" placeholder="Familia" v-model="familia" id="familia" class="form-control">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-3">-->
<!--                                    <label for="celular">Celular</label>-->
<!--                                    <input type="text" placeholder="Celular" v-model="celular" id="celular" class="form-control">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-3">-->
<!--                                    <label for="dir">Direccion</label>-->
<!--                                    <input type="text" placeholder="Familia" v-model="dir" id="dir" class="form-control">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-3">-->
<!--                                    <label for="obs">Observacion</label>-->
<!--                                    <input type="text" placeholder="Observacion" v-model="obs" id="obs" class="form-control">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                        <div class="row">-->
<!--                            <div class="col-2">-->
<!--                                <input type="text" placeholder="Familia" v-model="familia">-->
<!--                            </div>-->
<!--                            <div class="col-2">-->
<!--                                <input type="text" placeholder="Celular" v-model="celular">-->
<!--                            </div>-->
<!--                            <div class="col-2">-->
<!--                                <input type="text" placeholder="Direccion" v-model="dir">-->
<!--                            </div>-->
<!--                            <div class="col-2">-->
<!--                                <input type="text" placeholder="Observacion" v-model="obs">-->
<!--                            </div>-->
<!--                            <div class="col-2">-->
<!--                                <input type="text" placeholder="Hora" v-model="hora">-->
<!--                            </div>-->
<!--                            <div class="col-2">-->
<!--                                <button @click="reservar" class="btn btn-info btn-sm"><i class="fa fa-cog"></i> Reservar</button>-->
<!--                            </div>-->
<!--                        </div>-->

                    </h3>
                    <!--            <pre>{{ventas}}</pre>-->
<!--                    <h4>COMIDAS</h4>-->
                </div>
                <div v-for="i in datos" class="col-md-3" style="padding: 0;margin: 0;border: 0">
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
                                    Dis.:{{i.cantidad}} - Bs {{i.precio}}
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
<!--                <div class="col-md-12">-->
<!--                    <h4>BEBIDAS</h4>-->
<!--                </div>-->
<!--                <div v-for="i in datos" class="col-md-3" v-if="i.tipo=='BEBIDA'">-->
<!--                    <div class="ibox">-->
<!--                        <div class="ibox-content product-box">-->
<!--                            <div class="product-imitation" style="-->
<!--                    background-size: 100% 100%;-->
<!--                    background-repeat: no-repeat;-->
<!--                    "-->
<!--                                 v-bind:style="{ backgroundImage: 'url(' + i.photo + ')' }"-->
<!--                            >-->
<!--                                <div style="color: white;background: rgba(0,0,0,0.5)">{{i.nombre}}</div>-->
<!--                            </div>-->
<!--                            <div class="product-desc">-->
<!--                                <span class="product-price">-->
<!--                                    Bs {{i.precio}}-->
<!--                                </span>-->
<!--                                &lt;!&ndash;                        <div class="text-muted">Disponib: <b>{{i.cantidad}}</b></div>&ndash;&gt;-->
<!--                                &lt;!&ndash;                        <div class="text-muted">Vendidos: <b>{{i.sale.length}}</b></div>&ndash;&gt;-->
<!--                                &lt;!&ndash;                        <div class="text-muted">En Bolivi.: <b><label v-for="i in i.ventas">{{i.total}}</label></b></div>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <div class="text-muted">Bs. {{i.ventas[0]}}</div>&ndash;&gt;-->
<!--                                &lt;!&ndash;                                                <a href="#" class="product-name"> Product</a>&ndash;&gt;-->
<!--                                <div class="small m-t-xs" style="padding: 0px;margin:0px;border: 0px">-->
<!--                                    &lt;!&ndash;                                    <div class="text-muted">Disponib: <b>{{i.cantidad}}</b></div>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    <div class="text-muted">Vendidos: <b>{{i.sale.length}}</b></div>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                                    <div class="text-muted">En Bolivi.: <b><label v-for="i in i.ventas">{{i.total}}</label></b></div>&ndash;&gt;-->
<!--                                </div>-->
<!--                                <div class="text-center">-->
<!--                                    &lt;!&ndash;                            <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>&ndash;&gt;-->
<!--                                    &lt;!&ndash;                            <button @click="vender(i)" class="btn btn-primary btn-block"> <i class="fa fa-money"></i> Agregar</button>&ndash;&gt;-->
<!--                                    <button @click="mas(i)" class="btn btn-success "> <i class="fa fa-plus-circle"></i> </button>-->
<!--                                    <button @click="menos(i)" class="btn btn-danger "> <i class="fa fa-minus-circle"></i> </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
        <div class="col-md-4">
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
                    <td>{{i.subtotal}} Bs.</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{{total}} Bs.</td>
                </tr>
            </table>
<!--            {{ventas}}-->
<!--            <label v-for="i in ventas">{{i.nombre}} {{i.precio}}Bs</label>-->
        </div>
    </div>

</template>

<script>
import axios from 'axios';
export default {
    mounted() {
        this.misdatos()
        this.mitotal()
        axios.get('/delivery').then(res=>{
            // console.log(res.data)
            this.deliveries=res.data
            this.delivery=this.deliveries[0].id
        })
    },
    data:function (){
        return {
            datatable:null,
            datos:[],
            dato:{},
            // products:[],
            ventas:[],
            familia:'',
            dir:'',
            obs:'',
            hora:'12:00',
            celular:'',
            tipo:'RESTAURANT',
            deliveries:[],
            delivery:'',
            totale:0,
        }
    },
    methods:{
        mitotal(){
        axios.post('/mitotal').then(res=>{
            this.totale=res.data[0].total
        });
        },
        mas(i){
            const index=this.ventas.findIndex(item=>item.id===i.id);
            if (index==-1){
                i.cantidad=1;
                i.subtotal=i.cantidad*i.precio
                this.ventas.push(i);
            }else{
                this.ventas[index].cantidad=this.ventas[index].cantidad+1;
                this.ventas[index].subtotal=this.ventas[index].cantidad*this.ventas[index].precio;
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
        reservar(){
            if(this.familia==''){
                this.$fire({
                    title: "Seleciona familia",
                    // text: "text",
                    type: "error",
                    timer: 3000
                }).then(r => {
                    console.log(r.value);
                });
                return false;
            }
            if(this.ventas.length==0){
                this.$fire({
                    title: "Seleciona productos",
                    // text: "text",
                    type: "error",
                    timer: 3000
                }).then(r => {
                    console.log(r.value);
                });
                return false;
            }
            axios.post('/sales',{
                ventas:this.ventas,
                tipo:'RESERVA',
                tipo2:this.tipo,
                precio:this.total,
                familia:this.familia,
                dir:this.dir,
                obs:this.obs,
                hora:this.hora,
                celular:this.celular,
                delivery_id:this.delivery,
            }).then(res=>{
                // this.datos=res.data;
                console.log(res.data);
                this.$toast.open({
                    message: "Agregado correctamente",
                    type: "success",
                    duration: 3000,
                    dismissible: true
                });
                this.misdatos();
                this.mitotal();
                this.ventas=[];
            });
        },
        guardar(){
            if(this.ventas.length==0){
                this.$fire({
                    title: "Seleciona productos",
                    // text: "text",
                    type: "error",
                    timer: 3000
                }).then(r => {
                    console.log(r.value);
                });
                return false;
            }
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
                console.log(this.datos);
                // this.datos.forEach(r=>{
                //     let sum=0
                //     // r.details.forEach(r=>{
                //     //     // let s/um=0;
                //     //     sum=sum+r.cantidad
                //     // })
                //     // this.datos.
                // })
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




