'use strict';

$(document).ready(function () {
    $('.price-input').trigger('input');
    $('.radiology-categories-name,.charge-category').select2({
        width: '100%',
    });
});

$('#createRadiologyTest, #editRadiologyTest').
    find('input:text:visible:first').
    focus();

listen('change', '.charge-category', function (event) {
    let chargeCategoryId = $(this).val();
    (chargeCategoryId !== '')
        ? getRadiologyStandardCharge(chargeCategoryId)
        : $('.rd-test-standard-charge').val('')
});

window.getRadiologyStandardCharge = function (id) {
    $.ajax({
        url: $('.radiology-test-url').val() + '/get-standard-charge' + '/' + id,
        method: 'get',
        cache: false,
        success: function (result) {
            if (result !== '') {
                $('.rd-test-standard-charge').val(result.data)
                $('.price-input').trigger('input')
            }
        },
    });
};
