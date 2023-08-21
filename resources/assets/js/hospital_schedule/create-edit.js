'use strict';

listenSubmit('#saveForm', function (event) {
    event.preventDefault();
    let data = new FormData($(this)[0]);
    $.ajax({
        url: $('.checkRecords').val(),
        type: 'POST',
        data: $(this).serialize(),
        cache: false,
        success: function (result) {
            saveUpdateForm(data)
        },
        error: function (result) {
            swal({
                title: 'Warning !',
                text: result.responseJSON.message,
                icon: 'warning',
                buttons: {
                    confirm: $('.yesVariable').val(),
                    cancel: $('.noVariable').val(),
                },
            }).then(function (result) {
                if (result) {
                    saveUpdateForm(data)
                }
            })
        },
    })
})

function saveUpdateForm(data) {
    $.ajax({
        url: $('.hospitalScheduleRoute').val(),
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function (result) {
            if (result.success) {
                displaySuccessMessage(result.message)
                setTimeout(function () {
                    location.reload()
                }, 1500)
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message)
        },
        complete: function () {
        },
    });
}

listen('change', 'select[name^="startTimes"]', function (e) {
    let selectedIndex = $(this)[0].selectedIndex;
    let endTimeOptions = $(this).closest('.weekly-row').find('select[name^="endTimes"] option');
    endTimeOptions.eq(selectedIndex + 1).prop('selected', true).trigger('change');
    endTimeOptions.each(function (index) {
        if (index <= selectedIndex) {
            $(this).attr('disabled', true);
        } else {
            $(this).attr('disabled', false);
        }
    });
});
