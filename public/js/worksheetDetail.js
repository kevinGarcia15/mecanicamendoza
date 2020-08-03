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
    var balance = total - pasive;
    $("#balanceText").text(balance);
    $("#balance").val(balance);
}
//fija todos los valores en el modal para poder ser enviado
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
