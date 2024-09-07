(function ($) {

    $(".orphan_search").on("input", function (e) {
        let orphan = $(this).val();
        let type = $(this).data("id");
        let orphan_search_id_val = $('#orphan_id').val();
        let orphan_search_name_val = $('#orphan_name').val();
        let orphan_search_p_province_val = $('#orphan_p_province').val();
        let orphan_search_p_city_val = $('#orphan_p_city').val();
        let orphan_search_c_province_val = $('#orphan_c_province').val();
        let orphan_search_c_city_val = $('#orphan_c_city').val();
        let orphan_search_mother_name_val = $('#mother_name').val();
        let orphan_search_deceased_name_val = $('#deceased_name').val();
        let orphan_search_guardian_name_val = $('#guardian_name').val();
        let orphan_search_guardian_id_val = $('#guardian_id').val();
        let orphan_search_cause_of_death_val = $('#cause_of_death').val();
        let orphan_search_status_val = $('#status_health_orphan').val();
        let orphan_search_child_orphaned_parents_val = $('#child_orphaned_parents').val();
        let orphan_search_CH_house_val = $('#CH_house').val();
        let orphan_search_from_date_val = $('#date_of_birth_from').val();
        let orphan_search_to_date_val = $('#date_of_birth_to').val();
        let orphan_search_orphan_displaced_val = $('#orphan_displaced').val();
        let orphan_search_livery_val = $('#livery').val();
        let orphan_search_financial_aid_val = $('#financial_aid').val();
        let orphan_search_created_at_from_val = $('#created_at_from').val();
        let orphan_search_created_at_to_val = $('#created_at_to').val();
        let orphan_search_data_portal_val = $('#data_portal').val();
        let type_error = $('#error-filter').val();

        $.ajax({
            url: "/salah1/orphans_records/getData/", //data-id
            method: "get",
            data: {
                orphan: orphan,
                type: type,
                orphan_search_id : orphan_search_id_val,
                orphan_search_name : orphan_search_name_val,
                orphan_search_p_province : orphan_search_p_province_val,
                orphan_search_p_city : orphan_search_p_city_val,
                orphan_search_c_province : orphan_search_c_province_val,
                orphan_search_c_city : orphan_search_c_city_val,
                orphan_search_mother_name : orphan_search_mother_name_val,
                orphan_search_deceased_name : orphan_search_deceased_name_val,
                orphan_search_guardian_name : orphan_search_guardian_name_val,
                orphan_search_guardian_id : orphan_search_guardian_id_val,
                orphan_search_cause_of_death : orphan_search_cause_of_death_val,
                orphan_search_status : orphan_search_status_val,
                orphan_search_child_orphaned_parents : orphan_search_child_orphaned_parents_val,
                orphan_search_CH_house :orphan_search_CH_house_val,
                orphan_search_from_date :orphan_search_from_date_val,
                orphan_search_to_date :orphan_search_to_date_val,
                orphan_search_orphan_displaced :orphan_search_orphan_displaced_val,
                orphan_search_livery :orphan_search_livery_val,
                orphan_search_financial_aid :orphan_search_financial_aid_val,
                orphan_search_created_at_from : orphan_search_created_at_from_val,
                orphan_search_created_at_to : orphan_search_created_at_to_val,
                orphan_search_data_portal : orphan_search_data_portal_val,
                type_error : type_error,
                _token: csrf_token,
            },
            success: function (response) {
                $('.box_links').hide();
                $("#table_orphan").empty();
                if (response['data'].length != 0) {
                    for (let index = 0; index < response['data'].length; index++) {
                        let id = response['data'][index]["id"];
                        $("#table_orphan").append(
                            '<tr role="row" class="odd">'+
                                '<td> ' +
                                    '<a class="nav-link" href="'+ app_link +'/orphans_records/'+ id +'/edit">'+response['data'][index]["name"]+'</a>'+
                                '</td> ' +
                                '<td>'+response['data'][index]["gender"]+'</td> ' +
                                '<td>'+response['data'][index]["orphan_id"]+'</td> ' +
                                '<td>'+response['data'][index]["date_of_birth"]+'</td> ' +
                                '<td>'+response['data'][index]["orphan_age"]+'</td> ' +
                                '<td>'+response['data'][index]["guardian_name"]+'</td> ' +
                                '<td>'+response['data'][index]["guardian_RWO"]+'</td> ' +
                                '<td>'+response['data'][index]["guardian_id"]+'</td> ' +
                                '<td>'+response['data'][index]["status_health_orphan"]+'</td> ' +
                                '<td>'+response['data'][index]["deceased_name"]+'</td> ' +
                                '<td>'+response['data'][index]["date_of_death"]+'</td> ' +
                                '<td>'+response['data'][index]["p_province"]+'</td> ' +
                                '<td>'+response['data'][index]["p_city"]+'</td> ' +
                                '<td>'+response['data'][index]["child_orphaned_parents"]+'</td> ' +
                                '<td>'+response['data'][index]["N_brothers"]+'</td> ' +
                                '<td>'+response['data'][index]["N_sisters"]+'</td> ' +
                                '<td>'+response['data'][index]["mobile_number1"]+'</td> ' +
                                '<td>'+response['data'][index]["WhatsApp_number"]+'</td> ' +
                                '<td>'+response['data'][index]["livery"]+'</td> ' +
                                '<td>'+response['data'][index]["financial_aid"]+'</td> ' +
                            '</tr>'
                        );
                    }
                } else {
                    $("#table_orphan").append(
                        "<tr><td colspan='3'>لا توجد بيانات تطبق عليها الفلاتر هذه</td></tr>"
                    );
                }
            },
        });
    });
    // My edit in the table
    $("#filter-btn").click(function(){
        $("#filter-div").slideToggle();
    });

})(jQuery);


