<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Controlar productos</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <button type="button"  @click="crear" class="btn btn-primary" style="margin-bottom: 1em" >
                        <i class="fa fa-folder"></i> Crear Produtos
                    </button>
                    <button type="button" v-on:click="actualizar" class="btn btn-info" style="margin-bottom: 1em">
                        <i class="fa fa-refresh"></i>
                    </button>
                    <div class="modal inmodal fade" id="crear" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Crear </h4>
<!--                                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="guardar">
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label">Nombre</label>
                                            <div class="col-lg-5">
                                                <input type="text" name="nombre" placeholder="Nombre plato" v-model="dato.nombre" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label">Precio</label>
                                            <div class="col-lg-5">
                                                <input type="number" step="0.01" name="precio" placeholder="Precio" v-model="dato.precio" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label">Cantidad</label>
                                            <div class="col-lg-5">
                                                <input type="number" name="cantidad" placeholder="Cantidad" v-model="dato.cantidad" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Crear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal fade" id="modificar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Modificar </h4>
                                    <!--                                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="update">
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label">Nombre</label>
                                            <div class="col-lg-5">
                                                <input type="text" name="nombre" placeholder="Nombre plato" v-model="dato.nombre" class="form-control">
                                            </div>
                                            <label class="col-lg-1 col-form-label">Precio</label>
                                            <div class="col-lg-5">
                                                <input type="number" step="0.01" name="precio" placeholder="Precio" v-model="dato.precio" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label">Cantidad</label>
                                            <div class="col-lg-5">
                                                <input type="number" step="0.01"  name="cantidad" placeholder="Cantidad" v-model="dato.cantidad" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Fotografia</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(i,index) in datos" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{ i.nombre }}</td>
                            <td>{{ i.precio }}</td>
                            <td>{{ i.cantidad }}</td>
                            <td>{{ i.photo }}</td>
                            <td>
                                <span class="badge " :class="i.estado=='VISIBLE'?'badge-primary':'badge-warning'">{{ i.estado }}</span>
                            </td>
                            <td>
                                <button @click="modificar(i)" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                                <button @click="mostrar(i)" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button>
                                <button @click="eliminar(i)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
        // console.log('Component mounted.');
        // $('#example1').DataTable()
        // this.datatable = $('#example1').DataTable({});
        this.misdatos();
        // console.log(this.dato.password);
    },
    data:function (){
        return {
            datatable:null,
            datos:[],
            dato:{}
        }
    },
    methods:{
        crear(){
            this.dato={};
            $('#crear').modal('show');
        },
        misdatos(){
            axios.get('/product').then(res=>{
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
        mostrar(i){
            axios.get('/product/'+i.id).then(async res=>{
                await this.misdatos();
                // $('#crear').modal('hide');
                // this.$toast.open({
                //     message: "Cambiado estado",
                //     type: "success",
                //     duration: 3000,
                //     dismissible: true
                // });
                // this.dato={};
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


