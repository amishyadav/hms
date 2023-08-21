document.addEventListener('turbo:load', loadPlansData)

function loadPlansData() {
    $('.price-input').trigger('input')
    
    if(!$('.currency').length) {
        return
    }

    if(!$('.planType').length) {
        return
    }

    $('.currency').select2();

    $('.planType').select2();

    checkSmsEnable()

    if ($('.sms-limit').is(':checked')) {
        $('.sms-limit-section').removeClass('d-none')
    } else {
        $('.sms-limit-section').addClass('d-none')
    }

    $(window).on('beforeunload', function () {
        $('input[type=submit]').prop('disabled', 'disabled')
    })

    $('#createSubscriptionPlanForm, #editSubscriptionPlanForm').
        find('input:text:visible:first').
        focus()
    
    listenSubmit('#createSubscriptionPlanForm, #editSubscriptionPlanForm', function () {
            $('#btnSave').attr('disabled', true)
        })
}

listenChange('.sms-limit , #selectAllPlanFeatures', function (event) {
    checkSmsEnable()
})

function checkSmsEnable () {
    if ($('.sms-limit').is(':checked')) {
        $('.sms-limit-section').removeClass('d-none')
    } else {
        $('.sms-limit-section').addClass('d-none')
    }
}
