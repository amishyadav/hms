document.addEventListener('turbo:load', loadExpense)

function loadExpense () {
    if (!$('#indexExpenseUrl').length) {
        return
    }

    $('#expenseDate').flatpickr({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        locale: $('.userCurrentLanguage').val(),
    })

    let editDate = $('#editExpenseDate').flatpickr({
        format: 'YYYY-MM-DD',
        useCurrent: true,
        sideBySide: true,
        locale: $('.userCurrentLanguage').val(),
    })

    $('#expenseHead').select2({
        width: '100%',
    })
    $('#expenseId').select2({
        width: '100%',
        dropdownParent: $('#add_expenses_modal'),
    })
    $('#editExpenseHeadId').select2({
        width: '100%',
        dropdownParent: $('#edit_expenses_modal')
    });

    listenShownBsModal('#add_expenses_modal, #edit_expenses_modal', function () {
        $('#expenseId, #editExpenseHeadId:first').focus();
        $('#expenseId').select2({
            width: '100%',
            dropdownParent: $('#add_expenses_modal')
        });
        $('#editExpenseHeadId').select2({
            width: '100%',
            dropdownParent: $('#edit_expenses_modal')
        });
    });

}

listenClick('.deleteExpenseBtn', function (event) {
    let id = $(event.currentTarget).attr('data-id');
    deleteItem($('#indexExpenseUrl').val() + '/' + id, expensesTable,
        $('#expenseLang').val())
});

listenClick('.editExpensesBtn', function (event) {
    if ($('.ajaxCallIsRunning').val()) {
        return
    }
    ajaxCallInProgress()
    let expenseId = $(event.currentTarget).attr('data-id')
    renderExpenseData(expenseId)
})

function renderExpenseData(id) {
    $.ajax({
        url: $('#indexExpenseUrl').val() + '/' + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                let ext = result.data.document_url.split('.').pop().toLowerCase();
                if (ext == 'pdf') {
                    // $('#editPreviewImage').attr('src', $('.pdfDocumentImageUrl').val());
                    $('#editExpensePreviewImage').css('background-image',
                        'url("' + $('.pdfDocumentImageUrl').val() + '")');
                } else if ((ext == 'docx') || (ext == 'doc')) {
                    $('#editExpensePreviewImage').css('background-image',
                        'url("' + $('.docxDocumentImageUrl').val() + '")');
                } else if (ext == '') {
                    $('#editExpensePreviewImage').css('background-image',
                        'url("' +
                        $('#indexExpenseDefaultDocumentImageUrl').val() + '")')
                } else {
                    $('#editExpensePreviewImage').css('background-image',
                        'url("' + result.data.document_url + '")')
                }

                $('#editExpenseId').val(result.data.id)
                $('#editExpenseHeadId').
                    val(result.data.expense_head).
                    trigger('change.select2')
                $('#editExpenseName').val(result.data.name)
                document.querySelector('#editExpenseDate').
                    _flatpickr.
                    setDate(moment(result.data.date).format())
                $('#editExpenseInvoiceNumber').val(result.data.invoice_number)
                $('#editExpenseAmount').val(result.data.amount)
                $('.price-input').trigger('input')
                $('#editExpenseDescription').val(result.data.description)
                if (isEmpty(result.data.document_url)) {
                    $('#expenseDocumentUrl').hide()
                    $('.btn-view').hide()
                } else {
                    $('#expenseDocumentUrl').show()
                    $('.btn-view').show()
                    $('#expenseDocumentUrl').attr('href', result.data.document_url);
                }
                $('#edit_expenses_modal').appendTo('body').modal('show');
                ajaxCallCompleted();
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
}

listenSubmit('#addExpenseForm', function (event) {
    event.preventDefault();
    $('#expenseSave').attr('disabled', true);
    var loginButton = jQuery(this).find('#expenseSave');
    loginButton.button('loading');
    let data = {
        'formSelector': $(this),
        'url': $('#indexExpenseCreateUrl').val(),
        'type': 'POST',
        'tableSelector': expensesTable,
    };
    newRecord(data, loginButton, '#add_expenses_modal');
});

let expensesTable = '#expensesTable';

listenSubmit('#editExpensesForm', function (event) {
    event.preventDefault()
    $('#editExpenseSave').attr('disabled', true)
    let loadingButton = jQuery(this).find('#editExpenseSave')
    loadingButton.button('loading')
    let id = $('#editExpenseId').val()
    let url = $('#indexExpenseUrl').val() + '/' + id + '/update'
    let data = {
        'formSelector': $(this),
        'url': url,
        'type': 'POST',
        'tableSelector': expensesTable,
    };
    Livewire.emit('refresh')
    editRecord(data, loadingButton, '#edit_expenses_modal');
});

listenClick('#ExpenseResetFilter', function () {
    $('#expenseHead').val(0).trigger('change');
    hideDropdownManually($('#ExpenseFilterBtn'), $('.dropdown-menu'));
});

listenHiddenBsModal('#add_expenses_modal', function () {
    resetModalForm('#addExpenseForm', '#expenseErrorsBox');
    $('#expenseSave').attr('disabled', false);
    $('#expenseId').val('').trigger('change.select2');
    $('#expensePreviewImage').css('background-image', 'url(' + $('#indexExpenseDefaultDocumentImageUrl').val() + ')');
});

listenHiddenBsModal('#edit_expenses_modal', function () {
    $('#editExpenseSave').attr('disabled', false)
    resetModalForm('#editExpensesForm', '#editExpenseErrorsBox')
});

listenChange('#expenseAttachment', function () {
    let extension = isValidExpenseDocument($(this), '#expenseErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#expenseErrorsBox').html('').hide();
        displayDocument(this, '#expensePreviewImage', extension);
    }
});

listenChange('#editExpenseAttachment', function () {
    let extension = isValidExpenseDocument($(this), '#editExpenseErrorsBox');
    if (!isEmpty(extension) && extension != false) {
        $('#editExpenseErrorsBox').html('').hide();
        displayDocument(this, '#editExpensePreviewImage', extension);
    }
});

function isValidExpenseDocument(
    inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx']) ==
        -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).html($('#indexExpenseDocumentError').val()).show();
        return false;
    }
    return ext;
};

listenClick('.removeExpenseImage', function () {
    defaultImagePreview('#expensePreviewImage');
});
listenClick('.removeExpenseImageEdit', function () {
    defaultImagePreview('#editExpensePreviewImage');
});

listenChange('#expenseHead', function () {
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
});
