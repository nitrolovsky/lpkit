$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("input").on("input", function () {
    var idV = $('input[name="id"]').val();
    var valueAttr = $(this).val();
    var nameAttr = $(this).attr("name");
    $.ajax({
        type: "POST",
        url: "/pages/updateajax",
        data: {id: idV, namei: nameAttr, valuei: valueAttr },
        success: function(res) {
            console.log(res);
        }
    });
});
$("textarea").on("input", function () {
    var idV = $('input[name="id"]').val();
    var valueAttr = $(this).val();
    var nameAttr = $(this).attr("name");
    $.ajax({
        type: "POST",
        url: "/pages/updatedajax",
        data: {id: idV, namei: nameAttr, valuei: valueAttr, },
        success: function(res) {
            console.log(res);
        }
    });
});
