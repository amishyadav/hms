document.addEventListener('turbo:load', loadFAQData)

function loadFAQData() {
    
}

listenSubmit('#addNewFAQForm', function (event) {
    event.preventDefault()
    let loadingButton = jQuery(this).find('#faqBtnSave')
    loadingButton.button('loading')
    $('#faqBtnSave').attr('disabled', true)
    $.ajax({
        url: $('#superAdminFAQStore').val(),
        type: 'POST',
        data: $(this).serialize(),
        success: function success (result) {
            if (result.success) {
                displaySuccessMessage(result.message);
                $('#createFAQModal').modal('hide')
                livewire.emit('refresh')
                $('#faqBtnSave').attr('disabled', false)
            }
        },
        error: function error (result) {
            printErrorMessage('#validationErrorsBox', result);
            $('#faqBtnSave').attr('disabled', false);
        },
        complete: function complete () {
            loadingButton.button('reset');
        },
    });
})

listenClick('.faq-edit-btn', function (event) {
    let faqsId = $(event.currentTarget).attr('data-id');
    renderFaqData(faqsId)
})

listenClick('.faq-show-btn', function (event) {
    ajaxCallInProgress();
    let faqsId = $(event.currentTarget).attr('data-id');
    $.ajax({
        url: $('#superAdminFAQIndex').val() + '/' + faqsId,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showQuestion').text(result.data.question);
                $('#showAnswer').text(result.data.answer);
                $('#showFAQModal').modal('show');
                // ajaxCallCompleted();   
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
})

window.renderFaqData = function (id) {
    $.ajax({
        url: $('#superAdminFAQIndex').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            $('#faqsId').val(result.data.id)
            $('#editQuestion').val(result.data.question)
            $('#editAnswer').val(result.data.answer)
            $('#editFAQModal').modal('show')
            ajaxCallCompleted()
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

listenSubmit('#editFAQForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find('#faqBtnEditSave');
    loadingButton.button('loading');
    $('#faqBtnEditSave').attr('disabled', true);
    let id = $('#faqsId').val();
    $.ajax({
        url:  $('#superAdminFAQIndex').val() + '/' + id,
        type: 'post',
        data: $(this).serialize(),
        success: function (result) {
            displaySuccessMessage(result.message);
            $('#editFAQModal').modal('hide')
            livewire.emit('refresh')
            $('#faqBtnEditSave').attr('disabled', false)
        },
        error: function (result) {
            manageAjaxErrors(result);
            $('#faqBtnEditSave').attr('disabled', false);
        },
        complete: function () {
            loadingButton.button('reset');
        },
    });
})

listenHiddenBsModal('#createFAQModal', function () {
    resetModalForm('#addNewFAQForm', '#createFAQModal #validationErrorsBox');
    $('#faqBtnSave').attr('disabled', false);
})

listenHiddenBsModal('#editFAQModal', function () {
    resetModalForm('#editFAQForm', '#editFAQModal #editValidationErrorsBox');
    $('#faqBtnEditSave').attr('disabled', false);
})

listenClick('.faq-delete-btn', function (event) {
    let faqsId = $(event.currentTarget).attr('data-id');
    deleteItem($('#superAdminFAQIndex').val() + '/' + faqsId, $('#faqsTable'),
        $('#faqLang').val())
})
