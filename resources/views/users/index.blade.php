
@extends('layouts.app')
@section('css')
<style>
    .parsley-normal{
        border-color: #000 !important
    }
</style>
@endsection
@section('content')
<div class="panel panel-inverse" data-sortable-id="table-basic-1">
    <div class="panel-heading ui-sortable-handle">
        <h4 class="panel-title"></h4>
        <div class="panel-heading-btn">
            <button onclick="create()" class="btn btn-success">
                Crear
            </button>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 form-inline mb-3">
                <div class="form-group w-100">
                    <label class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-form-label">Nombre</label>
                    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-8">
                        <input id="search_nombre" type="text" class="form-control w-100">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 form-inline mb-3">
                <div class="form-group w-100">
                    <label class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-form-label">Cédula</label>
                    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-8">
                        <input id="search_cedula" type="text" class="form-control w-100">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 form-inline mb-3">
                <div class="form-group w-100">
                    <label class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-form-label">Email</label>
                    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-8">
                        <input id="search_email" type="text" class="form-control w-100">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 form-inline mb-3">
                <div class="form-group w-100">
                    <label class="col-xs-12 col-sm-5 col-md-4 col-lg-4 col-form-label">Celular</label>
                    <div class="col-xs-12 col-sm-7 col-md-6 col-lg-8">
                        <input id="search_celular" type="text" class="form-control w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre y Apellido</th>
                        <th>Cédula</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    /* variables de inicio */
    let data_modal_current = []
    let menu = document.getElementById('user-list');
    menu.classList.remove("closed");
    menu.classList.add("active");
    menu.classList.add("expand");

    /* funciones para ejecutar la modal */
    function elim(id) {
        Swal.fire({
            title: 'Estás seguro?',
            text: 'No serás capaz de recuperar el registro a borrar!',
            icon: 'error',
            showCancelButton: false
        }).then((result) => {
            if (result.isConfirmed) {
                let url = "{{ route('users.destroy', 'user_id' ) }}".replace('user_id', id);
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (res) {
                        if(res.type === 'success'){
                            location.reload();
                        }
                    }
                });
            }
        });
    };
    function create() {
        Swal.fire({
            title: 'Crear Usuario',
            showConfirmButton: false,
            html:`
                <form id="form_user_create" >
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Nombre y Apellido <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="text" id="name" name="name" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Nombre y Apellido" >
                                    <div id="text-error-name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Contraseña <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="password" id="password" name="password" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Contraseña" >
                                    <div id="text-error-password"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Numero de Telefono <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="text"  id="celular" name="celular" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su numero de Telefono" >
                                    <div id="text-error-celular"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Numero de Cédula </label>
                                <div class="col-lg-12">
                                    <input type="text"  id="cedula" name="cedula" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su numero de Cédula" >
                                    <div id="text-error-cedula"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Fecha de Nacimiento <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="text"  id="nacimiento" name="nacimiento" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Fecha de Nacimiento" >
                                    <div id="text-error-nacimiento"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Email</label>
                                <div class="col-lg-12">
                                    <input type="email"  id="email" name="email" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Email" >
                                    <div id="text-error-email"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top:20px">
                            <button onclick="create_Submit()" type="button" class="swal2-confirm swal2-styled" aria-label="" style="display: inline-block;">Crear Usuario</button>
                        </div>
                    </div>
                </form>`
        })
        $('#nacimiento').datepicker({ format: "yyyy-mm-dd", language: "en" });
    }
    function edit(params) {
        Swal.fire({
            title: 'Editar Usuario',
            showConfirmButton: false,
            html:`
                <form id="form_user_edit" >
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Nombre y Apellido <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="text" id="name" name="name" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Nombre y Apellido" value="${params.name}">
                                    <div id="text-error-name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Numero de Telefono <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="text"  id="celular" name="celular" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su numero de Telefono" value="${params.celular}">
                                    <div id="text-error-celular"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Numero de Cédula </label>
                                <div class="col-lg-12">
                                    <input type="text"  id="cedula" name="cedula" disabled class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su numero de Cédula" value="${params.cedula}">
                                    <div id="text-error-cedula"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Fecha de Nacimiento <span class="text-danger">*</span> </label>
                                <div class="col-lg-12">
                                    <input type="text"  id="nacimiento" name="nacimiento" class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Fecha de Nacimiento" value="${params.nacimiento}">
                                    <div id="text-error-nacimiento"></div>
                                </div>
                            </div> 
                        </div>
                        <div class="col-12">
                            <div class="form-group row m-b-0">
                                <label class=" text-lg-right col-form-label"> Email</label>
                                <div class="col-lg-12">
                                    <input type="text"  id="email" name="email" disabled class="form-control parsley-normal upper" style="color: #000 !important" placeholder="Ingrese su Email" value="${params.email}">
                                    <div id="text-error-email"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top:20px">
                            <button onclick="edit_Submit(${params.id})" type="button" class="swal2-confirm swal2-styled" aria-label="" style="display: inline-block;">Editar Usuario</button>
                        </div>
                    </div>
                </form>`
        })
        $('#nacimiento').datepicker({ format: "yyyy-mm-dd", language: "en" });
    };

    /* funciones para hacer el crud */
    function edit_Submit(id) {
        let nac_user_act = $('#nacimiento').val()
        let name_user_act = $('#name').val()
        let celular_user_act = $('#celular').val()
        let cedula_user_act = $('#cedula').val()
        let email_user_act = $('#email').val()
        let dateCurrent = new Date();
        let edad_new = dateCurrent.getFullYear() - nac_user_act.split('-')[0]
        let url = "{{ route('users.update', 'user_id' ) }}".replace('user_id', id);
        $.ajax({
            url: url,
            type: "PUT",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "name": name_user_act,
                "nacimiento": nac_user_act,
                "edad": edad_new,
                "celular": celular_user_act,
            },
            success: function (res) {
                if($('#celular').val().match(/[a-zA-Z]/gi)){
                    $(`#celular`).removeClass('parsley-normal').addClass('parsley-error')
                    $(`#text-error-celular`).empty().append(`<ul class="parsley-errors-list filled"><li class="parsley-required" style="text-align: left"> Ingrese solo caracteres numericos </li></ul>`)
                    return 0
                }
                if(res.type === 'error'){
                    Object.keys(res.data).find( ( item ) => {
                        $(`#${item}`).removeClass('parsley-normal').addClass('parsley-error')
                        $(`#text-error-${item}`).empty().append(`<ul class="parsley-errors-list filled"><li class="parsley-required" style="text-align: left"> ${ res.data[item] } </li></ul>`)
                    })
                }
                if(res.type === 'success'){
                    location.reload();
                }
            }
        });

    }
    function create_Submit() {
        let nac_user_act = $('#nacimiento').val()
        let name_user_act = $('#name').val()
        let celular_user_act = $('#celular').val()
        let cedula_user_act = $('#cedula').val()
        let password_user_act = $('#password').val()
        let email_user_act = $('#email').val()
        let dateCurrent = new Date();
        let edad_new = dateCurrent.getFullYear() - nac_user_act.split('-')[0]
        let url = "{{ route('users.store') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                "name": name_user_act,
                "nacimiento": nac_user_act,
                "edad": edad_new,
                "celular": celular_user_act,
                "cedula": cedula_user_act,
                "password": password_user_act,
                "email": email_user_act,
            },
            success: function (res) {
                if($('#password').val().match(/[A-Z0-9]/gi)){ }else{
                    $(`#password`).removeClass('parsley-normal').addClass('parsley-error')
                    $(`#text-error-password`).empty().append(`<ul class="parsley-errors-list filled"><li class="parsley-required" style="text-align: left"> La contraseña debe contener: Numeros, Mayusculas y Caracteres Especiales ([-().^+) </li></ul>`)
                    return 0
                }
                if($('#celular').val().match(/[a-zA-Z]/gi)){
                    $(`#celular`).removeClass('parsley-normal').addClass('parsley-error')
                    $(`#text-error-celular`).empty().append(`<ul class="parsley-errors-list filled"><li class="parsley-required" style="text-align: left"> Ingrese solo caracteres numericos </li></ul>`)
                    return 0
                }
                if(res.type === 'error'){
                    Object.keys(res.data).find( ( item ) => {
                        $(`#${item}`).removeClass('parsley-normal').addClass('parsley-error')
                        $(`#text-error-${item}`).empty().append(`<ul class="parsley-errors-list filled"><li class="parsley-required" style="text-align: left"> ${ res.data[item] } </li></ul>`)
                    })
                }
                if(res.type === 'success'){
                    location.reload();
                }
            }
        });

    }
    
    /* funcion requerida para dar propiedad a datatable */
    function dataTable() {
        let table = $('#data-table-default').DataTable({
            searching: false,
            responsive: true,
            processing: true,
            serverSide: true,
            lengthChange: true,
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'cedula' },
                { data: 'email' },
                { data: 'celular' },
                { 
                    render: function ( data,type, row  ) {  
                        let dateCurrent = new Date();
                        let año = row.nacimiento.split('-');
                        return  `${row.nacimiento} ( ${ dateCurrent.getFullYear() - año[0] } Años )`;
                    }
                },
                { 
                    render: function ( data,type, row  ) {
                        data_modal_current[row.id] = row
                        let url_edit = "{{ route('users.edit', 'user_id' ) }}".replace('user_id', row.id);
                        let url_destroy = "{{ route('users.destroy', 'user_id' ) }}".replace('user_id', row.id);
                        return `
                            <a onclick="elim(${row.id})" class="btn btn-danger btn-icon btn-circle"><i class="fa fa-times"></i></a>
                            <a onclick="edit(data_modal_current[${row.id}])" class="btn btn-yellow btn-icon btn-circle"><i class="fas fa-pen"></i></a>
                        `;
                    }
                },
            ],
            ajax: {
                "url": "{{route('users.service')}}",
                "data": function (d) {[
                    d.search_nombre = $('#search_nombre').val(),
                    d.search_cedula = $('#search_cedula').val(),
                    d.search_email = $('#search_email').val(),
                    d.search_celular = $('#search_celular').val(),
                ]}
            },
            columnDefs: [
                { 
                    orderable: false, 
                    targets: 1 
                }
            ],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "emptyTable":  "Sin datos disponibles",
                "zeroRecords": "Ningun resultado encontrado",
                "info": "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
                "infoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "infoEmpty": "Ningun valor disponible",
                "loadingRecords": "Cargando...",
                "processing":     "Procesando...",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Ultimo",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            }
        }).on( 'processing.dt', function ( e, settings, processing ) {
            if(processing){ }else{ }
        });
    }

    /* ejecutar despues de cargar la pagina */
    $(document).ready(function() {
        dataTable()
        $("#search_nombre").blur( () =>{ $('#data-table-default').DataTable().ajax.reload() }); 
        $("#search_cedula").blur( () => { $('#data-table-default').DataTable().ajax.reload() }); 
        $("#search_email").blur( () => { $('#data-table-default').DataTable().ajax.reload() }); 
        $("#search_celular").blur( () => { $('#data-table-default').DataTable().ajax.reload() }); 
    });
</script>
@endsection




