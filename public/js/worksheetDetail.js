/*hace calculos para congelar la hoja de trabajo*/
var sub_total = parseInt($('#sub_total').val())
/*inicia con esto por si envia sin hacer cambios*/
$('#totalText').text(sub_total)
$('#balanceText').text(sub_total)

$('#descont').change(function() {
    refreshPayment();
})
$('#otherExpenses').change(function() {
    refreshPayment();
})
$('#pasive').change(function() {
    refreshPayment();
})

function refreshPayment() {
    var descont = parseInt($('#descont').val())
    var otherExpenses = parseInt($('#otherExpenses').val())
    var pasive = parseInt($('#pasive').val())
    var total = (sub_total - descont) + otherExpenses;
    /*fija los totales tanto en texto como en el input*/
    $('#totalText').text(total)
    $('#active').val(total)
    var balance = total - pasive
    $('#balanceText').text(balance)
    $('#balance').val(balance)
}
