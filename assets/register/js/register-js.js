var countNo = 1;
// add register
$('.add-data').click(function () {
    var $clone = $('.body-data').find('tr.clone').clone(true).removeClass('clone');
    $('.body-data').append($clone);
});
// delete register
$('.del-data').click(function () {
    $(this).parents('.data').detach();
});

$(document).ready(function() {
    $(".selcet-2").select2({
        theme: "bootstrap"
    });
});