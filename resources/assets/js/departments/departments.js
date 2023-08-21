'use strict';

$(document).on('change', '.is-active', function (event) {
    let departmentId = $(event.currentTarget).attr('data-id');
    updateDepartmentStatus(departmentId)
});

window.updateDepartmentStatus = function (id) {
    $.ajax({
        url: departmentUrl + id + '/active-deactive',
        method: 'post',
        cache: false,
        success: function (result) {
            if (result.success) {
                $(tableName).DataTable().ajax.reload(null, false)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
    })
};

$(document).on('submit', '#addNewForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find("#btnSave");
    loadingButton.button('loading');
    let data = {
        'formSelector': $(this),
        'url': departmentCreateUrl,
        'type': 'POST',
        'tableSelector': tableName
    };
    newRecord(data, loadingButton);
});

$(document).on('submit', '#editForm', function (event) {
    event.preventDefault();
    let loadingButton = jQuery(this).find("#btnEditSave");
    loadingButton.button('loading');
    let id = $('#departmentId').val();
    let url = departmentUrl + id;
    let data = {
        'formSelector': $(this),
        'url': url,
        'type': 'PUT',
        'tableSelector': tableName
    };
    editRecordWithForm(data, loadingButton);
});

$(document).on('click', '.edit-btn', function (event) {
    let departmentId = $(event.currentTarget).attr('data-id');
    renderDepartmentsData(departmentId)
});

$(document).on('click', '.delete-btn', function (event) {
    let id = $(event.currentTarget).attr('data-id');
    deleteItem(departmentUrl + id, tableName, $('#departmentLang').val())
});

window.renderDepartmentsData = function (id) {
    $.ajax({
        url: departmentUrl + id + '/edit',
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#departmentId').val(result.data.id)
                $('#editName').val(result.data.name)
                if (result.data.is_active) {
                    $('#editIsActive').val(1).prop('checked', true)
                }
                $('#EditModal').modal('show');
            }
        },
        error: function (result) {
            manageAjaxErrors(result);
        },
    });
};

$('#filter_active').select2({
    width: '100%',
});
