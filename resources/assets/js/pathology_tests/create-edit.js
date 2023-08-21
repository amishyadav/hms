'use strict';
document.addEventListener('turbo:load', loadPathologyTestData)

function loadPathologyTestData() {
    $('.price-input').trigger('input');
    $('.pathologyCategories,.pChargeCategories').select2({
        width: '100%',
    });
}

$('#createPathologyTest, #editPathologyTest').
    find('input:text:visible:first').
    focus();

listenChange('.pChargeCategories', function (event) {
    let chargeCategoryId = $(this).val();
    (chargeCategoryId !== '') ? getStandardCharge(chargeCategoryId) : $(
        '.pathologyStandardCharge').val('');
});

window.getStandardCharge = function (id) {
    $.ajax({
        url: $('.pathologyTestActionURL').val() + '/get-standard-charge' + '/' + id,
        method: 'get',
        cache: false,
        success: function (result) {
            if (result !== '') {
                $('.pathologyStandardCharge').val(result.data);
                $('.price-input').trigger('input');
            }
        },
    });
};
