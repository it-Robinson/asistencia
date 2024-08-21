var tabla;

//funcion que se ejecuta al inicio
function init(){
   listar();
      listaru();
	  listar_por_departamento();
$("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })

    //cargamos los items al select cliente
   $.post("../ajax/asistencia.php?op=selectPersona", function(r){
   	$("#idcliente").html(r);
   	$('#idcliente').selectpicker('refresh');
   });

}
$(document).ready(function() {
    listar();

    // Hacer que las celdas sean editables al hacer clic
    $('#tbllistado').on('click', '.editable', function() {
        var $this = $(this);
        var originalContent = $this.text().trim();
        var id = $this.data('id');
        var column = $this.data('column');

        // Verificar si ya hay un campo de entrada activo en la misma celda
        if ($this.find('input').length > 0) {
            return;
        }

        // Manejar caso de contenido vacío o "No marco"
        var valueToEdit = (originalContent === '' || originalContent === 'No marco') ? 'No marco' : originalContent;

        var input = $('<input>', {
            value: valueToEdit,
            type: 'text',
            css: {
                'background-color': '#fff0f0', // Color de fondo para indicar edición
                'border': '1px solid #ccc',   // Borde del campo de entrada
                'padding': '5px',             // Espaciado interno
                'width': '100%',              // Ancho completo del campo de entrada
                'color': 'black'              // Color del texto en negro
            },
            blur: function() {
                var newContent = $(this).val().trim();
                if (newContent !== originalContent) {
                    // Enviar la actualización al servidor
                    $.ajax({
                        url: '../ajax/asistencia.php?op=actualizarCampo',
                        method: 'POST',
                        data: {
                            id: id,
                            column: column,
                            value: newContent
                        },
                        success: function(response) {
                            console.log(response);
                            // Recargar la página después de la actualización
                            location.reload();
                        },
                        error: function() {
                            // Restablecer el contenido original en caso de error
                            $this.text(originalContent === '' ? 'No marco' : originalContent);
                        }
                    });
                } else {
                    // Si no ha cambiado, restablecer el contenido original
                    $this.text(originalContent === '' ? 'No marco' : originalContent);
                }
            },
            keyup: function(e) {
                if (e.which === 13) $(this).blur();
            }
        }).appendTo($this.empty()).focus();

        // Colocar el cursor al final del texto en el campo de entrada
        input[0].setSelectionRange(valueToEdit.length, valueToEdit.length);
    });
});

function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/asistencia.php?op=listar',
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "asc"]]
    }).DataTable();
}



function listaru(){
	tabla=$('#tbllistadou').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listaru',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



function listar_asistencia(){
var  fecha_inicio = $("#fecha_inicio").val();
 var fecha_fin = $("#fecha_fin").val();
 var idcliente = $("#idcliente").val();

	tabla=$('#tbllistado_asistencia').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listar_asistencia',
			data:{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin, idcliente: idcliente},
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
function listar_asistenciau(){
var  fecha_inicio = $("#fecha_inicio").val();
 var fecha_fin = $("#fecha_fin").val();

	tabla=$('#tbllistado_asistenciau').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listar_asistenciau',
			data:{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin},
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
function listar_toda_asistencia() {
    tabla = $('#tbllistado_asistenciau').dataTable({
        "aProcessing": true, //activamos el procedimiento del datatable
        "aServerSide": true, //paginacion y filrado realizados por el server
        dom: 'Bfrtip', //definimos los elementos del control de la tabla
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/asistencia.php?op=listar_asistenciau', // Cambiar la URL para reflejar el nuevo endpoint
            type: "get",
            dataType: "json",
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLength": 10, //paginacion
        "order": [
            [0, "desc"]
        ] //ordenar (columna, orden)
    }).DataTable();
}

//VER TABLA POR DEPARTAMENTO
function listar_por_departamento(){
	tabla=$('#tbllistadopordepa').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listar_por_departamento',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}

function desactivar(idasistencia){
	bootbox.confirm("¿Esta seguro de eliminar este dato?", function(result){
		if (result) {
			$.post("../ajax/asistencia.php?op=desactivar", {idasistencia : idasistencia}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();