document.addEventListener('turbo:load', loadMailData)

'use strict';

function loadMailData() {
    $('#emailId').focus();

    listen('change', '#mailAttachmentImage', function () {
        let extension = isValidDocument($(this), '#validationErrorsBox');
        if (!isEmpty(extension) && extension != false) {
            $('#validationErrorsBox').html('').hide();
            displayDocument(this, '#mailPreviewImage', extension);
        }
    });

    window.isValidDocument = function (
        inputSelector, validationMessageSelector) {
        let ext = $(inputSelector).val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx']) ==
            -1) {
            $(inputSelector).val('');
            $(validationMessageSelector).html(
                'The document must be a file of type: jpeg, jpg, png, pdf, doc, docx.').show();
            return false;
        }
        return ext;
    };

    listenClick('.remove-image', function () {
        defaultImagePreview('#mailPreviewImage');
    });
}
