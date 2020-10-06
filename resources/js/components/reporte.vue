<template>
    <section class="content">
        <div class="row">


            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Reporte de ventas</h5>
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
                        <form role="form">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inicio">Fecha inicio</label>
                                            <input type="date" v-model="date1" class="form-control" id="inicio" placeholder="Enter email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="fin">Fecha final</label>
                                            <input type="date" v-model="date2" class="form-control" id="fin" placeholder="Enter email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="actualizar">Consultar</label>
                                            <button type="button " v-on:click.prevent="actualizar" id="actualizar" class="btn btn-block btn-info" style="margin-bottom: 1em">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
<!--                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="html5buttons"><div class="dt-buttons btn-group"><a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Copy</span></a><a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>CSV</span></a><a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Excel</span></a><a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>PDF</span></a><a class="btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Print</span></a></div></div><div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 25 of 57 entries</div>-->
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 116px;">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 148px;">Fecha venta</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 132px;">Plato</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 98px;">Precio</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 66.0001px;">Usuario</th></tr>
                                </thead>
                                <tbody>
                                <tr class="gradeA odd" role="row">
                                    <td class="sorting_1">Gecko</td>
                                    <td>Firefox 1.0</td>
                                    <td>Win 98+ / OSX.2+</td>
                                    <td class="center">1.7</td>
                                    <td class="center">A</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">#</th>
                                    <th rowspan="1" colspan="1">Fecha venta</th>
                                    <th rowspan="1" colspan="1">Plato</th>
                                    <th rowspan="1" colspan="1">Precio</th>
                                    <th rowspan="1" colspan="1">Usuario</th></tr>
                                </tfoot>
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

        this.datatable = $('#DataTables_Table_0').DataTable({
            // "order": [[ 0, "desc" ]],
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv','excel', 'pdf', 'print'
            ]
        });

        this.misdatos();
        // console.log('aa');
        // console.log(this.dato.password);
    },
    data:function (){
        return {
            datatable:null,
            datos:[],
            dato:{tipo:''},
            date1:moment().format('YYYY-MM-DD'),
            date2:moment().format('YYYY-MM-DD'),
            moment:moment,
        }
    },
    methods:{
        // crear(){
        //     this.dato={tipo:''};
        // },
        misdatos(){
            // axios.get('/asistencia').then(res=>{
            //     this.datos=res.data;
            //     console.log(this.datos);
            // });


            axios.get('/consulta/'+this.date1+'/'+this.date2).then(res=>{
                this.datos=res.data;
                // console.log(this.datos)
                this.datatable.clear().draw();
                let cont=0;
                this.datos.forEach(r=>{
                    console.log(r);
                    cont++;
                    this.datatable.row.add([
                        cont,
                        moment(r.created_at).format('DD-MM-YY HH:mm:ss'),
                        r.product.nombre,
                        r.precio,
                        // moment(r.salida).format('DD-MM-YY HH:mm:ss'),
                        // r.salida,
                        r.user.name,
                        // r.estado,
                        // r.objetos,
                        // r.observaciones,
                    ]).draw(false)
                    //     <th rowspan="1" colspan="1">#</th>
                    // <th rowspan="1" colspan="1">Fecha venta</th>
                    // <th rowspan="1" colspan="1">Plato</th>
                    // <th rowspan="1" colspan="1">Precio</th>
                    // <th rowspan="1" colspan="1">Usuario</th></tr>
                })
                // console.log(this.datos);
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
