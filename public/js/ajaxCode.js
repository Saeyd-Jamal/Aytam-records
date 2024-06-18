(function ($) {

    $("#orphan_id").on("input", function (e) {
        let orphanId = $(this).val();
        $(".orphan_id_box").empty();
        $.ajax({
            url: "/salah1/orphans_records/checkID/", //data-id
            method: "get",
            data: {
                orphanId: orphanId,
                _token: csrf_token,
                },
            success: function (response) {
                console.log(response);
                $(".orphan_id_box").empty();
                $(".orphan_id_box").append(
                    response
                );
            },
        });
    });
    $('#child_orphaned_parents').on("change", function (e) {
        let fields_mother = $(".fields_mother");
        let val = $(this).val();
        if(val == "يتيم الأم" || val == "يتيم الوالدين") {
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


