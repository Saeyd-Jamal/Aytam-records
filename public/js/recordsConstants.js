(function ($) {
    $(".gender").on("change", function (e) {
        let genderVal = $('#gender').val();
        $('#old-gender').val(genderVal) ;
    });
    $(".province").on("change", function (e) {
        let provinceVal = $('#province').val();
        $('#old-province').val(provinceVal) ;
    });
    $(".city").on("change", function (e) {
        let cityVal = $('#city').val();
        $('#old-city').val(cityVal) ;
    });
    $(".address_of_birth").on("change", function (e) {
        let address_of_birthVal = $('#address_of_birth').val();
        $('#old-address_of_birth').val(address_of_birthVal) ;
    });
    $(".guardian_RWO").on("change", function (e) {
        let guardian_RWOVal = $('#guardian_RWO').val();
        $('#old-guardian_RWO').val(guardian_RWOVal) ;
    });
    $(".status_health_orphan").on("change", function (e) {
        let status_health_orphanVal = $('#status_health_orphan').val();
        $('#old-status_health_orphan').val(status_health_orphanVal) ;
    });
    $(".child_orphaned_parents").on("change", function (e) {
        let child_orphaned_parentsVal = $('#child_orphaned_parents').val();
        $('#old-child_orphaned_parents').val(child_orphaned_parentsVal) ;
    });
    $(".CH_house").on("change", function (e) {
        let CH_houseVal = $('#CH_house').val();
        $('#old-CH_house').val(CH_houseVal) ;
    });
    $(".orphan_displaced").on("change", function (e) {
        let orphan_displacedVal = $('#orphan_displaced').val();
        $('#old-orphan_displaced').val(orphan_displacedVal) ;
    });
    $(".livery").on("change", function (e) {
        let liveryVal = $('#livery').val();
        $('#old-livery').val(liveryVal) ;
    });
    $(".financial_aid").on("change", function (e) {
        let financial_aidVal = $('#financial_aid').val();
        $('#old-financial_aid').val(financial_aidVal) ;
    });
})(jQuery);


