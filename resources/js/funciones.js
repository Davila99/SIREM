export function initializeDataTable(tableId) {
    $("#" + tableId).DataTable({
        responsive: true,
        lengthChange: [
            [5, 10, 50, -1],
            [5, 10, 50, "All"],
        ],
        language: {
            lengthMenu: "Mostrar _MENU_ registros por pagina",
            zeroRecords: "No se encontraron resultados en su busqueda",
            searchPlaceholder: "Buscar registros",
            info: "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            infoEmpty: "No existen registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            search: "Buscar:",
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                last: '<i class="fas fa-angle-double-right"></i>',
            },
        },
    });
}

$(document).ready(function () {
    var tableId = "tablaEstudiantes";
    initializeDataTable(tableId);
});
