'use strict';

document.addEventListener('turbo:load', loadInReportCreateEditData)

function  loadInReportCreateEditData() {
    $('#date').flatpickr({
        format: 'YYYY-MM-DD HH:mm:ss',
        useCurrent: true,
        sideBySide: true,
        enableTime: true,
        locale: $('.userCurrentLanguage').val(),
    });
    $('.patient-in-report-id,.doctor-in-report-id,.status-in-report').select2({
        width: '100%',
    });

    $('#createInvestigationForm, #editInvestigationForm').
        find('input:text:visible:first').
        focus();
}

listenChange('#attachment', function () {
    let extension = isValidDocument($(this), '#validationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#validationErrorsBox').html('').hide();
        //document url
        if (extension === 'pdf') {
            $('.image-input-wrapper').css('background-image', 'url(' + $('#pdfDocumentImageUrl').val() + ')');
        } else if (extension === 'doc') {
            $('.image-input-wrapper').css('background-image', 'url(' + $('#docxDocumentImageUrl').val() + ')');
        }
        //old preview
        // displayDocument(this, '#previewImage', extension);
    }
});

window.isValidDocument = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).html(
            'The document must be a file of type: jpeg, jpg, png, pdf, doc, docx.').show();
        return false;
    }
    return ext;
};

listenClick('.remove-image', function () {
    defaultImagePreview('#previewImage');
});
