/*hace calculos para congelar la hoja de trabajo*/
var sub_total = parseInt($("#sub_total").val());
/*inicia con esto por si envia sin hacer cambios*/
$("#totalText").text(sub_total);
$("#balanceText").text(sub_total);

$("#descont").change(function() {
    refreshPayment();
});
$("#otherExpenses").change(function() {
    refreshPayment();
});
$("#pasive").change(function() {
    refreshPayment();
});

function refreshPayment() {
    var descont = parseInt($("#descont").val());
    var otherExpenses = parseInt($("#otherExpenses").val());
    var pasive = parseInt($("#pasive").val());
    var total = sub_total - descont + otherExpenses;
    /*fija los totales tanto en texto como en el input*/
    $("#totalText").text(total);
    $("#active").val(total);
    $("#pasive").attr('max', total)
    var balance = total - pasive;
    $("#balanceText").text(balance);
    $("#balance").val(balance);
}
//fija todos los valores en el modal para poder ser enviado y editar el repuesto
$(".editBtn").click(function() {
    let select_tr = $(this)
        .parents()
        .eq(4);
    let quantity = select_tr
        .children()
        .eq(0)
        .val();
    let description = select_tr
        .children()
        .eq(1)
        .val();
    let price = select_tr
        .children()
        .eq(2)
        .val();
    let remplacement_id = select_tr
        .children()
        .eq(3)
        .val();
    let path =
        "http://" +
        window.location.host +
        "/mecanicamendoza/public/replacement/" +
        remplacement_id +
        "";

    $("#editReplacementId").val(remplacement_id);
    $("#edithPrice").val(price);
    $("#edithDescription").val(description);
    $("#editQuantity").val(quantity);
    $("#edtihFormReplacement").attr("action", path);
});
//------------------------------------------------------------------------------
//Eliminar hoja de trabajo
$(".btn_delete").click(function(){
  Swal.fire({
    title: '¿Está seguro?',
    text: "No podrá revertir esta acción",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Si, eliminar!'
  }).then((result) => {
    if (result.value) {
      $("#delete_worksheet").submit()
    }
  })
})

/*Funcin para editar una tarea*/
$(".btnEditWork").click(function() {
    let select_tr = $(this)
        .parents()
        .eq(3);
    let select_div = select_tr
        .children()
        .eq(0)
    let description = select_div
        .children()
        .eq(1)
        .text();
    let worktodo_id = select_div
        .children()
        .eq(2)
        .val();
    let path =
        "http://" +
        window.location.host +
        "/mecanicamendoza/public/worktodoUpdate/" +
        worktodo_id +
        "";
        console.log(description)
        console.log(worktodo_id)
    $("#editWorkId").val(worktodo_id);
    $("#edithDescriptionWork").val(description);
    $("#edtihFormWork").attr("action", path);
});

/*Funcion para agregar una fila para ingresar una nueva hoja de trabajo*/
$("#BtnaddRowReplacement").click(function() {
    $("#addRowReplacement").append(
        $("<div>")
            .attr("id", "works")
            .addClass("row newRow")
            .append(
                $("<div>")
                    .addClass(
                        "col-12 col-sm-12 col-xs-12 col-lg-2 col-xl-2 my-1"
                    )
                    .append(
                        $("<input>")
                            .attr("type", "number")
                            .attr("required", "true")
                            .attr("min", "1")
                            .addClass("form-control")
                            .attr("name", "quantity[]")
                            .attr("value", "1")
                    )
            )
            .append(
                $("<div>")
                    .addClass(
                        "col-12 col-sm-12 col-xs-12 col-lg-7 col-xl-7 my-1"
                    )
                    .append(
                        $("<input>")
                            .attr("type", "text")
                            .attr("required", "true")
                            .addClass("form-control")
                            .attr("name", "description[]")
                            .attr("placeholder", "Código")
                            .attr("value", "")
                            .attr("placeholder", "Descripción del producto..")
                    )
            )
            .append(
                $("<div>")
                    .addClass(
                        "col-12 col-sm-12 col-xs-12 col-lg-2 col-xl-2 my-1"
                    )
                    .append(
                        $("<input>")
                            .attr("type", "number")
                            .attr("required", "true")
                            .attr("step", "any")
                            .attr("min", "0")
                            .addClass("form-control")
                            .attr("name", "price[]")
                            .attr("value", "0")
                    )
            )
            .append(
                $("<div>")
                    .addClass("col-1 col-sm-1 col-lg-1")
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
    );
    $(".btn-delete").click(function(e) {
        e.preventDefault();
        var row = $(this).parents(".newRow");
        row.remove();
    });
});
