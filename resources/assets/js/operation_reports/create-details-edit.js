document.addEventListener('turbo:load', loadOperationReportDate)

function loadOperationReportDate() {
    $('#editOperationDoctorId, #editOperationCaseId').select2({
        width: '100%',
        dropdownParent: $('#editOperationsReportsModal'),
    });

    $('#editOperationDate').flatpickr({
        dateFormat: 'Y-m-d h:i K',
        useCurrent: true,
        sideBySide: true,
        enableTime: true,
        locale: $('.userCurrentLanguage').val(),
    });
}

listenHiddenBsModal('#editOperationsReportsModal', function () {
    resetModalForm('#editOperationReportsForm', '#editOperationErrorsBox')
    $('#editOperationSave').attr('disabled', false)
})
