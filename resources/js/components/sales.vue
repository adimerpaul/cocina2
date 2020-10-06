<template>
    <div class="row">
        <div v-for="i in datos" class="col-md-3">
            <div class="ibox">
                <div class="ibox-content product-box">
                    <div class="product-imitation">
                        {{i.nombre}}
                    </div>
                    <div class="product-desc">
                                <span class="product-price">
                                    Bs {{i.precio}}
                                </span>
                        <small class="text-muted">Disponible {{i.cantidad}}</small>
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
            products:[],
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
        guardar(){
            axios.post('/product',this.dato).then(res=>{
                this.misdatos();
                $('#crear').modal('hide');
                this.$toast.open({
                    message: "Dato creado",
                    type: "success",
                    duration: 3000,
                    dismissible: true
                });
                this.dato={};
            })
        },
        update(){
            axios.put('/product/'+this.dato.id,this.dato).then(res=>{
                // console.log(res.data);
                this.misdatos();
                $('#modificar').modal('hide');
                this.$toast.open({
                    message: "Dato modificado",
                    type: "warning",
                    duration: 3000,
                    dismissible: true
                });
                this.dato={};
            })
        },
        actualizar(){
            this.misdatos();
            this.$toast.open({
                message: "Datos Actualizados",
                type: "success",
                duration: 2000,
                dismissible: true
            })
        },
        modificar(i){
            $('#modificar').modal('show');
            this.dato=i;
        },
        eliminar(i){
            this.$fire({
                title: 'Seguro de eliminar??',
                // text: "You won't be able to revert this!",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((r) => {
                if (r.value){
                    axios.delete('/product/'+i.id).then(res=>{
                        this.misdatos();
                        // $('#modal-default').modal('hide');
                        this.$toast.open({
                            message: "Dato Eliminado",
                            type:"error",
                            duration: 3000,
                            dismissible: true
                        });
                        this.dato={};
                    })
                }
            })
        },
    },
    computed:{
        reg:function (){
            // console.log(this.dato.password);
            if (this.dato.password=='' || this.dato.password==this.dato.password2)
                return false;
            else
                return true;
        }
    }
}
</script>




