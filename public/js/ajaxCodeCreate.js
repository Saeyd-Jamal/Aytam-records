(function ($) {
    $(".orphan_id").on("input", function (e) {
        let orphanId = $(this).val();
        let idRow = $(this).attr("id");
        $("#orphan_id_box_" + idRow).empty();
        $.ajax({
            url: app_link + "records/checkID", //data-id
            method: "post",
            data: {
                orphanId: orphanId,
                _token: csrf_token,
            },
            success: function (response) {
                $("#orphan_id_box_"+idRow).empty();
                $("#orphan_id_box_"+idRow).html(
                    response
                );
            },
        });
    });
    $('.child_orphaned_parents').on("change", function (e) {
        let fields_mother = $(".fields_mother");
        let val = $(this).val();
        if(val == "يتيم الأبوين") {
            fields_mother.removeAttr("disabled");
        }
        if(val == "يتيم الأب" || val == '') {
            fields_mother.attr('disabled', 'disabled');
        }
    })
    $('#orphan_displaced').on("change", function (e) {
        let fields_address_displaced = $(".fields_address_displaced");
        let val = $(this).val();
        if(val == "نعم") {
            fields_address_displaced.removeAttr("disabled");
        }
        if(val == "لا" || val == '') {
            fields_address_displaced.attr('disabled', 'disabled');
        }
    })
})(jQuery);


