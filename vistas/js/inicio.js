$(".tablaSinServer").DataTable();

$(".tablaConServer").DataTable({
    "deferRender": true,
    "retrieve": true,
    "orderClasses": false,
    "processing": true,
    "serverSide": true,
    "serverMethod": 'POST',
    'ajax': {
        'url': 'ajax/datatable-claves.ajax.php'
    },
    "order": [0, 'desc'],
    "columns": [
        {data: 'id'},
        {data: 'codigo'},
        {data: 'descripcion'}
    ],
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});
