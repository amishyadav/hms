document.addEventListener('turbo:load', loadbedsData)

'use strict';

function loadbedsData() {
    const editBedTypeElement = $('#editBedType')

    if(editBedTypeElement.length){
        $('#editBedType').select2({
            width: '100%',
            dropdownParent: $('#edit_beds_modal')
        });
    }
}

listenClick('.bed-edit-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return;
    }
    ajaxCallInProgress();
    let bedId = $(event.currentTarget).data('id');
    renderBedData(bedId);
});
function renderBedData(id) {
    $.ajax({
        url: $('.bedUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#bedId').val(result.data.id);
                $('#editBedName').val(result.data.name);
                $('#editBedType').val(result.data.bed_type).trigger('change.select2');
                $('#editBedDescription').val(result.data.description);
                $('#editBedCharge').val(result.data.charge);
                $('.price-input').trigger('input');
                $('#edit_beds_modal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
}


listenHiddenBsModal('#edit_beds_modal', function () {
    resetModalForm('#EditBedsForm', '#editValidationErrorsBox');
});
