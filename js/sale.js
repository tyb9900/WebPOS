$(document).ready(function(){

    $("#AddArticle").click(function (e) {
        e.preventDefault();
        var table = $("#cart").DataTable();
        var article = $("#article option:selected").text();
        var totalPairs= parseInt($("#totalPairs").val());
        var totalAmount = parseFloat($("#totalAmount").val());
        $.ajax({url: "AJAXCalls/cart.php", data:"Article="+article,success: function(result){
                var obj = JSON.parse(result);
                var pairs = $("#pairs").val();
                totalPairs+= parseInt(pairs);
                totalAmount+= parseFloat(obj.Price*pairs);
                table.row.add( [
                    article,
                    obj.Category,
                    obj.Price,
                    pairs,
                    (obj.Price*pairs)
                ] ).draw( false );
                $("#totalPairs").val(totalPairs);
                $("#totalAmount").val(totalAmount);
                $("#pairs").val('');
            }});
    });


    function storeTblValues()
    {
        var TableData = new Array();

        $('#cart tr').each(function(row, tr){
            TableData[row]={
                "Article" : $(tr).find('td:eq(0)').text()
                , "Category" :$(tr).find('td:eq(1)').text()
                , "Price" : $(tr).find('td:eq(2)').text()
                , "Pairs" : $(tr).find('td:eq(3)').text()
                , "Amount" : $(tr).find('td:eq(4)').text()
            }
        });
        TableData.shift();  // first row will be empty - so remove
        return TableData;
    }

    $("#checkout").click(function () {
        var table = $('#cart').DataTable();

        if ( ! table.data().count() ) {
            alert( 'Empty cart' );
            return;
        }
        var d= new Date();
        var date = ("0" + d.getDate()).slice(-2) + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" +
            d.getFullYear();
        var ddate = date.split("-").reverse().join("-");

        var TableData;
        TableData = storeTblValues();
        TableData = JSON.stringify(TableData);
        var totalPairs= ($("#totalPairs").val());
        var totalAmount = parseFloat($("#totalAmount").val());
        $.ajax({
            type: "POST",
            url: "AJAXCalls/saleapi.php",
            data: {
                "TableData": TableData,
                "totalPairs": totalPairs,
                "totalAmount": totalAmount,
                "date": ddate,
            },
            success: function(msg){
                var table = $("#cart").DataTable();
                table.clear().draw();
                // return value stored in msg variable
                alert(msg);

            }
        });
    });

});