$(document).ready(function() {
    $(".info_box").find(".info_close").click(function () {
        $(this).closest(".info_box").css("display", "none");
    });
});
