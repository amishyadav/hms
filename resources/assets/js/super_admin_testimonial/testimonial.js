document.addEventListener('turbo:load', loadTestimonialData)

function loadTestimonialData() {
    
}

listenSubmit('#addNewTestimonialForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#testimonialBtnSave')
    loadingButton.button('loading')
    let formData = new FormData($(this)[0])
    $('#testimonialBtnSave').attr('disabled', true)
    $.ajax({
        url: $('#superAdminTestimonialStore').val(),
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function success (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#addTestimonialModal').modal('hide')
                window.livewire.emit('refresh')
                $('#testimonialBtnSave').attr('disabled', false)
            }
        },
        error: function error (result) {
            printErrorMessage('#validationErrorsBox', result);
            $('#testimonialBtnSave').attr('disabled', false);
        },
        complete: function complete () {
            loadingButton.button('reset');
        },
    });
})

listenClick('.testimonial-show-btn', function () {
    let id = $(this).attr('data-id');
    $.ajax({
        url: $('#superAdminTestimonialIndex').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let ext = result.data.image_url.split('.').
                    pop().
                    toLowerCase();
                if (ext == '') {
                    $('#showPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")');
                } else {
                    $('#showPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")');
                }
                $('.show-name').text(result.data.name);
                $('.show-position').text(result.data.position);
                $('.show-description').text(result.data.description);
                if (isEmpty(result.data.document_url)) {
                    $('#documentUrl').hide();
                    $('.btn-view').hide();
                } else {
                    $('#documentUrl').show();
                    $('.btn-view').show();
                    $('#documentUrl').attr('href', result.data.document_url);
                }
                $('#showModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
})

listenClick('.testimonial-edit-btn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress();
    let testimonialId = $(event.currentTarget).attr('data-id');
    renderTestimonialData(testimonialId)
})

window.renderTestimonialData = function (id) {
    $.ajax({
        url: $('#superAdminTestimonialIndex').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let ext = result.data.image_url.split('.').
                    pop().
                    toLowerCase()
                if (ext == '') {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")');
                } else {
                    $('#editPreviewImage').
                        css('background-image',
                            'url("' + result.data.image_url + '")');
                }
                $('#testimonialId').val(result.data.id);
                $('#editName').val(result.data.name);
                $('#editPosition').val(result.data.position);
                $('#editDescription').val(result.data.description);
                if (isEmpty(result.data.document_url)) {
                    $('#documentUrl').hide();
                    $('.btn-view').hide();
                } else {
                    $('#documentUrl').show();
                    $('.btn-view').show();
                    $('#documentUrl').attr('href', result.data.document_url);
                }
                $('#editTestimonialModal').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};
//
$('.description').on('keyup', function () {
    $('.description').attr('maxlength', 150);
});
$('.description').attr('maxlength', 150);

listenSubmit('#editAdminTestimonialForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#editTestimonialBtnSave')
    loadingButton.button('loading')
    $('#editTestimonialBtnSave').attr('disabled', true)
    let id = $('#testimonialId').val()
    let formData = new FormData($(this)[0])
    $.ajax({
        url: $('#superAdminTestimonialIndex').val() + '/' + id,
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#editTestimonialModal').modal('hide')
                livewire.emit('refresh')
                $('#editTestimonialBtnSave').attr('disabled', false)
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
            $('#editTestimonialBtnSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
})

listenHiddenBsModal('#addTestimonialModal', function () {
    resetModalForm('#addNewTestimonialForm', '#addTestimonialModal #validationErrorsBox');
    $('#previewImage').
        attr('src', $('#testimonialDefaulImageURL').val()).
        css('background-image', `url(${$('#testimonialDefaulImageURL').val()})`);
    $('#testimonialBtnSave').attr('disabled', false);
})

listenShownBsModal('#addTestimonialModal', function () {
    $('#addTestimonialModal #validationErrorsBox').show();
    $('#addTestimonialModal #validationErrorsBox').addClass('d-none');
})

listenHiddenBsModal('#editTestimonialModal', function () {
    resetModalForm('#editAdminTestimonialForm',
        '#editTestimonialModal #editValidationErrorsBox')
    $('#previewImage').
        attr('src', $('#testimonialDefaulImageURL').val()).
        css('background-image',
            `url(${$('#testimonialDefaulImageURL').val()})`)
    $('#editTestimonialBtnSave').attr('disabled', false);
})

listenShownBsModal('#editTestimonialModal', function () {
    $('#editTestimonialModal #editValidationErrorsBox').show();
    $('#editTestimonialModal #editValidationErrorsBox').addClass('d-none');
})

listenClick('.testimonial-delete-btn', function (event) {
    let testimonialId = $(event.currentTarget).attr('data-id');
    deleteItem(route('admin-testimonial.destroy', testimonialId),
        $('#AdminTestimonialTbl'), $('#adminTestimonialLang').val());
})

listenChange('#profile', function () {
    let extension = isValidDocument($(this), '#addTestimonialModal #validationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        displayDocument(this, '#previewImage', extension);
    }
})

listenChange('#editProfile', function () {
    let extension = isValidDocument($(this),
        '#editTestimonialModal #editValidationErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        displayDocument(this, '#editPreviewImage', extension);
    }
})

window.isValidDocument = function (
    inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg']) ==
        -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).
            html($('#testimonialProfileError').val()).
            removeClass('d-none');
        return false;
    }
    $(validationMessageSelector).
        html($('#testimonialProfileError').val()).
        addClass('d-none');
    return ext;
};
