<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Controlar de inventario</h5>
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
                        <i class="fa fa-shopping-bag"></i> Crear inventario
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
                                                <input type="text" name="nombre" placeholder="Nombre producto" v-model="dato.nombre" class="form-control">
                                            </div>
<!--                                            <label class="col-lg-1 col-form-label">Precio</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="number" step="0.01" name="precio" placeholder="Precio" v-model="dato.precio" class="form-control">-->
<!--                                            </div>-->
                                        </div>
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-1 col-form-label">Cantidad</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="number" name="cantidad" placeholder="Cantidad" v-model="dato.cantidad" class="form-control">-->
<!--                                            </div>-->
<!--                                            <label class="col-lg-1 col-form-label">Tipo</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <select required class="form-control" v-model="dato.tipo">-->
<!--                                                    <option value="">Seleccionar...</option>-->
<!--                                                    <option value="COMIDA">COMIDA</option>-->
<!--                                                    <option value="BEBIDA">BEBIDA</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-2 col-form-label">Fotografia</label>-->
<!--                                            <div class="col-lg-10">-->
<!--                                                <input type="file" name="image" @change="getImage" accept="image/*" required>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Crear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal fade" id="aumentar" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Hisorial de  Manteles</h4>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="agregar" >
                                        <div class="form-group row">
                                            <label class="col-lg-1 col-form-label" >Tipo</label>
                                            <div class="col-lg-2">
                                                <select name="" id="ttipo" class="form-control" v-model="dato.tipo" required>
                                                    <option value="">Seleccionar...</option>
                                                    <option value="Aumentar">Aumentar</option>
                                                    <option value="Reducir">Reducir</option>
<!--                                                    <option v-for="(p,index) in datos" :key="index" :value="p.id">{{p.nombre}}</option>-->
                                                </select>
                                            </div>
                                            <label class="col-lg-1 col-form-label">Cantidad</label>
                                            <div class="col-lg-2">
                                                <input type="number"   name="cantidad" placeholder="Cantidad" v-model="dato.cantidad" class="form-control" required>
                                            </div>
                                            <label class="col-lg-1 col-form-label">Detalle</label>
                                            <div class="col-lg-3">
                                                <input type="text"   name="detalle" placeholder="detalle" v-model="dato.detalle" class="form-control">
                                            </div>
                                            <div class="col-lg-2">
                                                <button type="submit" class="btn btn-success"  > <i class="fa fa-plus-square-o"></i> Agregar</button>
                                            </div>
                                        </div>
<!--                                        <table class="table">-->
<!--                                            <thead>-->
<!--                                                <tr>-->
<!--                                                    <th>#</th>-->
<!--                                                    <th>Producto</th>-->
<!--                                                    <th>Cantidad</th>-->
<!--                                                    <th>Opciones</th>-->
<!--                                                </tr>-->
<!--                                            </thead>-->
<!--                                            <tbody>-->
<!--                                                <tr v-for="(a,i) in agregados" :key="i" >-->
<!--                                                    <td>{{i+1}}</td>-->
<!--                                                    <td>{{a.nombre}}</td>-->
<!--                                                    <td>{{a.cantidad}}</td>-->
<!--                                                    <td><button class="btn btn-danger btn-sm" type="button" @click="eliminaragregado(a.id)"><i class="fa fa-trash"></i></button></td>-->
<!--                                                </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-trash"></i> Cerrar</button>
<!--                                            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Modificar</button>-->
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
<!--                                            <label class="col-lg-1 col-form-label">Precio</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="number" step="0.01" name="precio" placeholder="Precio" v-model="dato.precio" class="form-control">-->
<!--                                            </div>-->
                                        </div>
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-1 col-form-label">Cantidad</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="number" step="0.01"  name="cantidad" placeholder="Cantidad" v-model="dato.cantidad" class="form-control">-->
<!--                                            </div>-->
<!--                                            <label class="col-lg-1 col-form-label">Tipo</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <select name="" id="" class="form-control" v-model="dato.tipo">-->
<!--                                                    <option value="">Seleccionar...</option>-->
<!--                                                    <option value="COMIDA">COMIDA</option>-->
<!--                                                    <option value="BEBIDA">BEBIDA</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-2 col-form-label">Fotografia</label>-->
<!--                                            <div class="col-lg-10">-->
<!--                                                <input type="file" id="imgUpdate" name="image" @change="getImage" accept="image/*" >-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash"></i> Cancelar</button>
                                            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal inmodal fade" id="foto" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Modificar </h4>
                                    <!--                                    <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>-->
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="updatefoto">
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-1 col-form-label">Nombre</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="text" name="nombre" placeholder="Nombre plato" v-model="dato.nombre" class="form-control">-->
<!--                                            </div>-->
<!--                                            <label class="col-lg-1 col-form-label">Precio</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="number" step="0.01" name="precio" placeholder="Precio" v-model="dato.precio" class="form-control">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-1 col-form-label">Cantidad</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <input type="number" step="0.01"  name="cantidad" placeholder="Cantidad" v-model="dato.cantidad" class="form-control">-->
<!--                                            </div>-->
<!--                                            <label class="col-lg-1 col-form-label">Tipo</label>-->
<!--                                            <div class="col-lg-5">-->
<!--                                                <select name="" id="" class="form-control" v-model="dato.tipo">-->
<!--                                                    <option value="">Seleccionar...</option>-->
<!--                                                    <option value="COMIDA">COMIDA</option>-->
<!--                                                    <option value="BEBIDA">BEBIDA</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label">Fotografia</label>
                                            <div class="col-lg-10">
                                                <input type="file" id="imgUpdate" name="image" @change="getImage" accept="image/*" >
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
<!--                            <th>Precio</th>-->
                            <th>Cantidad</th>
<!--                            <th>Fotografia</th>-->
                            <th>Historial</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(i,index) in datos" :key="index">
                            <td>{{index+1}}</td>
                            <td>{{ i.nombre }}</td>
<!--                            <td>{{ i.precio }}</td>-->
                            <td>{{ i.cantidad }}</td>
<!--                            <td>{{ i.tipo }}</td>-->
<!--                            <td>-->
<!--                                <a :href="i.photo" target="_blank" >-->
<!--                                    <img :src="i.photo" alt="" width="50">-->
<!--                                </a>-->
<!--                            </td>-->
                            <td>
<!--                                <span class="badge " :class="i.estado=='VISIBLE'?'badge-primary':'badge-warning'">{{ i.estado }}</span>-->
<!--                                {{i.logs}}-->
                                <ul>
                                    <li v-for="(l,i) in i.logs" :key="i">{{l.cantidad}} <div class="badge" :class="l.tipo=='Aumentar'?'badge-success':'badge-danger'">{{l.tipo}} </div>{{l.detalle}}</li>
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button @click="modificar(i)" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button @click="aumentar(i)" class="btn btn-primary btn-xs"><i class="fa fa-plus-circle"></i></button>
<!--                                    <button @click="reducir(i)" class="btn btn-secondary btn-xs"><i class="fa fa-minus-circle"></i></button>-->
<!--                                    <button @click="foto(i)" class="btn btn-success btn-xs"> <i class="fa fa-camera"></i> </button>-->
<!--                                    <button @click="mostrar(i)" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></button>-->
                                    <button @click="eliminar(i)" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                </div>

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
            dato:{},
            imagen : null,
            agregados:[]
        }
    },
    methods:{
        misagregados(id){
            axios.get('/misagregados/'+id).then(res=>{
                // console.log(res.data)
                this.agregados=res.data
                // this.misagregados(this.dato.id)
            })
        },
        getImage(event){
            //Asignamos la imagen a  nuestra data
            this.imagen = event.target.files[0];
        },
        eliminaragregado(id){
            axios.delete('/inventario/'+id).then(res=>{
                // console.log(res.data)
                // this.agregados=res.data
                this.misagregados(this.dato.id)
            })
        },
        crear(){
            this.dato={};
            $('#crear').modal('show');
        },
        misdatos(){
            axios.get('/inventario').then(res=>{
                this.datos=res.data;
                console.log(this.datos);
            });
        },
        guardar(){
            // let data=new FormData();
            // data.append('nombre',this.dato.nombre);
            // data.append('cantidad',this.dato.cantidad);
            // data.append('precio',this.dato.precio);
            // data.append('tipo',this.dato.tipo);
            // data.append('image',this.imagen);
            // data.append('nombre',this.dato.nombre);
            // data.append('nombre',this.dato.nombre);

            axios.post('/inventario',{nombre:this.dato.nombre,cantidad:0}).then(res=>{
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
        agregar(){
            axios.post('/log',{
                inventario_id:this.dato.id,
                // product_id2:this.dato.producto_id,
                cantidad:this.dato.cantidad,
                detallle:this.dato.detallle,
                tipo:this.dato.tipo,
            }).then(res=>{
                // console.log(res.data)
                this.$toast.open({
                    message: "Dato agregado",
                    type: "success",
                    duration: 3000,
                    dismissible: true
                });
                $('#aumentar').modal('hide')

                this.misdatos();
                // this.misagregados(this.dato.id)
                // this.dato={};
            })
        },
        update(){
            // let data=new FormData();
            // data.append('nombre',this.dato.nombre);
            // data.append('cantidad',this.dato.cantidad);
            // data.append('precio',this.dato.precio);
            // data.append('tipo',this.dato.tipo);
            // data.append('image',this.imagen);
            // data.append('_method', 'PUT');
            axios.put('/inventario/'+this.dato.id,this.dato).then(res=>{
                // console.log('asaa');
                // console.log(res.data);
                // return false;
                $('#imgUpdate').val('');
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
        updatefoto(){
            let data=new FormData();
            // data.append('nombre',this.dato.nombre);
            // data.append('cantidad',this.dato.cantidad);
            // data.append('precio',this.dato.precio);
            // data.append('tipo',this.dato.tipo);
            data.append('image',this.imagen);
            // data.append('_method', 'PUT');
            axios.post('/updateFoto/'+this.dato.id,data).then(res=>{
                // console.log('asaa');
                console.log(res.data);
                // return false;
                $('#imgUpdate').val('');
                this.misdatos();
                $('#foto').modal('hide');
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
            $('#modificar').modal('show')
            this.dato=i
        },
        aumentar(i){
            $('#aumentar').modal('show')
            // this.dato.nombre=i.nombre
            this.dato.id=i.id
            this.dato.cantidad=1
            this.misagregados(i.id)
        },
        reducir(i){
            $('#aumentar').modal('show')
            this.dato=i
            this.dato.cantidad=1
            this.misagregados(i.id)
        },
        foto(i){
            $('#foto').modal('show');
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
                    axios.delete('/inventario/'+i.id).then(res=>{
                        this.misdatos();
                        // $('#modal-default').modal('hide');
                        this.$toast.open({
                            message: "Dato Eliminado",
                            type:"error",
                            duration: 3000,
                            dismissible: true
                        });
                        this.dato={};
                    }).catch(err=>{
                        this.$toast.open({
                            message: err.response.data.message,
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


