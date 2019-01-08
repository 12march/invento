function pendingInvoice()
{
    var quantity = $("#quantity").val();
    var customerName = $("#customerName").val();
    var categoryName = $("#categoryName").val();
    var productName = $("#productName").val();
    var refNum = $('#refNum').val();

    $.ajax({
        type: "POST",
        url: "model/ajax_pendingInvoice.php",
        data: { quantity: quantity },
        cache: false,
        success: function(response)
        {
            //alert(response);return false;
            $("#rowid5").html(response);
        }
    });

//        alert(quantity + ' ' + customerName + ' ' + categoryName + ' ' + productName);

}
