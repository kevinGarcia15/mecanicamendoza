/*Archivo js para las funciones de la vista newClient.blade.php*/
$(document).ready(function() {
    $("#addRow").click(function() {
        $("#rowWorks").append(
            $("<div>")
                .attr("id", "works")
                .addClass("row")
                .append(
                    $("<div>")
                        .addClass("col-9 col-sm-10 col-lg-10 mx-auto")
                        .append(
                            $("<input>")
                                .attr("type", "text")
                                .addClass("form-control my-2")
                                .attr("placeholder", "Código")
                                .attr("name", "worksToDo[]")
                                .attr("value", "")
                                .attr("placeholder", "Trabajo...")
                        )
                )
                .append(
                    $("<div>")
                        .addClass("col-3 col-sm-2 col-lg-2")
                        .append(
                            $("<button>")
                                .addClass("btn btn-danger btn-delete my-2")
                                .append(
                                  $("<span>")
                                        .addClass("material-icons")
                                        .text("delete")
                                )
                        )
                )
            //------------fin del selector
        );
        $(".btn-delete").click(function(e) {
            e.preventDefault();
            var row = $(this).parents(".row");
            row.remove();
        });
    });
});
