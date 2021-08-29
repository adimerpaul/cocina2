<template>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Pedidos</h5>
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
                        <div class="table-responsive">
                            <!--                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="html5buttons"><div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Copy</span></a><a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Excel</span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>PDF</span></a><a class="btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Print</span></a></div></div><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 25 of 57 entries</div>-->
                            <table class="table table-bordered"  aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >#</th>
<!--                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 148px;">Fecha reserva</th>-->
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" >Tipo</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Familia</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Direccion</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Celular</th>

                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Hora</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Productos</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Total</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Observacion</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Delivery</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" >Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
<!--                                <tr v-for="(i,index) in datos" :key="index" class="gradeA odd" role="row">-->
<!--                                    <td class="sorting_1">{{index+1}}</td>-->
<!--                                    <td>Numero {{i.numpedido}}</td>-->
<!--                                    <td>{{i.familia}} {{i.celular}} {{i.dir}} {{i.obs}} {{i.hora}}</td>-->
<!--                                    <td>{{i.total}}</td>-->
<!--                                    <td>-->
<!--                                        <div v-for="p in i.products">{{p.nombre}}</div>-->
<!--                                    </td>-->
<!--                                    <td class="center">-->
<!--                                        <button @click="cancelar(i)" class="btn btn-danger btn-xs"> <i class="fa fa-close"></i> Cancelar</button>-->
<!--                                        <button @click="entregar(i)" class="btn btn-success btn-xs"> <i class="fa fa-save"></i> Entregar</button>-->
<!--                                    </td>-->
<!--                                </tr>-->
                                <tr v-for="(i,index) in datos" :key="index" class="gradeA odd" role="row">
<!--                                    <td class="sorting_1">{{index+1}}</td>-->
                                    <td>{{i.numpedido}}</td>
                                    <td>
                                        <div class="badge badge-info" v-if="i.tipo2=='RESTAURANT'">{{i.tipo2}}</div>
                                        <div class="badge badge-success" v-if="i.tipo2=='ENVIAR'">{{i.tipo2}}</div>
                                        <div class="badge badge-primary" v-if="i.tipo2=='RECOGER'">{{i.tipo2}}</div>
                                    </td>
                                    <td>FAMILIA: {{i.familia}}</td>
                                    <td>DIRECCION: {{i.dir}} </td>
                                    <td>CELULAR: {{i.celular}}</td>

                                    <td>HORA: {{i.hora}}</td>
                                    <td>
                                        <div v-for="(detail,index) in i.details" :key="index">{{detail.cantidad}} {{detail.nombre}}  {{detail.subtotal}}Bs</div>
                                    </td>
                                    <td>TOTAL:{{i.precio}}</td>
                                    <td>OBS.:{{i.obs}}</td>
                                    <td>{{i.delivery.nombre}}</td>
                                    <td class="center">
                                        <div v-if="i.tipo!='VENTA'" class="btn-group">
                                        <button @click="cancelar(i)" class="btn btn-danger btn-xs"> <i class="fa fa-close"></i> Cancelar</button>
                                        <button @click="entregar(i)" class="btn btn-success btn-xs"> <i class="fa fa-save"></i> Entregar</button>
                                        </div>
                                        <span v-else class="badge badge-info">Realizado la venta</span>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import Vue from "vue";
import moment from "moment";
export default {
    mounted() {
        // console.log('Component mounted.');
        // $('#example1').DataTable()
        // this.datatable = $('#DataTables_Table_0').DataTable({});

        this.misdatos();
        // console.log('aa');
        // console.log(this.dato.password);
    },
    data:function (){
        return {
            datatable:null,
            datos:[],
            dato:{tipo:''},
            // datos:[],
            moment:moment,
        }
    },
    methods:{
        // crear(){
        //     this.dato={tipo:''};
        // },
        misdatos() {
            // axios.get('/asistencia').then(res=>{
            //     this.datos=res.data;
            //     console.log(this.datos);
            // });
            this.datos=[];
            axios.get('/reservas').then(res=>{
                this.datos=res.data;
                // console.log(res.data)
                // res.data.forEach(r=>{
                //     let index=this.datos.findIndex(item=>item.numpedido===r.numpedido)
                //     if (index==-1){
                //         this.datos.push({
                //             total:r.precio,
                //             numpedido:r.numpedido,
                //             familia:r.familia,
                //             celular:r.celular,
                //             dir:r.dir,
                //             obs:r.obs,
                //             hora:r.hora,
                //             products:[r.product]});
                //         // this.datos[index].products=;
                //     }else{
                //         this.datos[index].total=this.datos[index].total+r.precio;
                //         this.datos[index].products.push(r.product);
                //     }
                // })
            });
        },
        guardar(){
            // axios.post('/persona',this.dato).then(res=>{
            //     this.misdatos();
            //     $('#modal-default').modal('hide');
            //     this.$toast.open({
            //         message: "Dato creado",
            //         type: "success",
            //         duration: 3000,
            //         dismissible: true
            //     });
            //     this.dato={tipo:''};
            // })
        },
        cancelar(i){
            this.$fire({
                title: 'Seguro cancelar?',
                // text: "You won't be able to revert this!",
                type: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SI'
            }).then(r => {
                // console.log(r.value);
                if(r.value){
                    axios.post('/cancelar',{numpedido:i.numpedido}).then(res=>{
                        this.$fire({
                            title:'Cancelado',
                            type:'success'
                        })
                        this.misdatos();
                    })
                }
            });

        },
        entregar(i){
            this.$fire({
                title: 'Seguro entregar?',
                // text: "You won't be able to revert this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SI'
            }).then(r => {
                // console.log(r.value);
                if(r.value){
                    axios.post('/entregar',{numpedido:i.numpedido}).then(res=>{
                        this.$fire({
                            title:'Entregado',
                            type:'success'
                        })
                        this.misdatos();
                    })
                }
            });
        },
        update(){
            axios.put('/ingresoauto/'+this.dato.id,this.dato).then(res=>{
                console.log(res.data);
                this.misdatos();
                $('#modificar').modal('hide');
                this.$toast.open({
                    message: "Dato modificado",
                    type: "warning",
                    duration: 3000,
                    dismissible: true
                });
                this.dato={tipo:''};
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
        observacion(i){
            $('#modificar').modal('show');
            this.dato=i;
        },
        salida(i){
            this.$fire({
                title: 'Seguro de marcar salida??',
                // text: "You won't be able to revert this!",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((r) => {
                if (r.value){
                    axios.get('/ingresoauto/'+i.id).then(res=>{
                        this.misdatos();
                        // $('#modal-default').modal('hide');
                        this.$toast.open({
                            message: "marcado salida",
                            type:"info",
                            duration: 3000,
                            dismissible: true
                        });
                        this.dato={tipo:''};
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
    },
    filters: {
        fecha: function (date) {
            return moment(date).format('DD-MM-YYYY HH:mm:ss ');
        }
    }
}
</script>
