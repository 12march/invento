

    function getCategory()
    {
        var name = $("#categoryName").val();

        $.ajax({
            type: "POST",
            url: "model/ajax_getCategory.php",
            data: {name: name},
            cache: false,
            success: function(response)
            {
                //alert(response);return false;
                $("#productName").html(response);
            }
        });

    }



//    function pendingInvoice()
//    {
//        var quantity = $("#quantity").val();
//        var customerName = $("#customerName").val();
//        var categoryName = $("#categoryName").val();
//        var productName = $("#productName").val();
//        var refNum = $('#refNum').val();
//
//        $.ajax({
//            type: "POST",
//            url: "model/ajax_pendingInvoice.php",
//            data: {
//                quantity: quantity,
//                customerName: customerName,
//                categoryName: categoryName,
//                productName: productName,
//                refNum = refNum
//            },
//            cache: false,
//            success: function(response)
//            {
//                alert(response);return false;
//                //$("#rowid5").html(response);
//            }
//        });
//
////            alert(quantity + ' ' + customerName + ' ' + categoryName + ' ' + productName);
//
//    }
