'use strict'
document.addEventListener('turbo:load', loadPackagesCreateEdit)

let uniquePackageId = $('.packageUniqueId').val()

const dropdownToPackageSelecte2 = (selector) => {
    $(selector).select2({
        placeholder: 'Select Service',
        width: '100%',
    })
}

function loadPackagesCreateEdit () {
    const dropdownToPackageSelecte2 = (selector) => {
        $(selector).select2({
            placeholder: 'Select Service',
            width: '100%',
        })
    }

    $('#packageForm').find('input:text:visible:first').focus()

    dropdownToPackageSelecte2('.serviceId')

    listenClick( '.delete-service-package-item', function () {
        $(this).parents('tr').remove();
        resetServicePackageItemIndex();
        calculateAndSetTotalAmount();
    });

    const removeCommas = (str) => {
        return str.replace(/,/g, '');
    };

    window.isNumberKey = (evt, element) => {
        let charCode = (evt.which) ? evt.which : event.keyCode;

        return !((charCode !== 46 || $(element).val().indexOf('.') !== -1) &&
            (charCode < 48 || charCode > 57));
    };

    listenKeyup('.packages-qty', function () {
        let qty = parseInt($(this).val());
        let rate = $(this).parent().siblings().find('.packages-price').val();
        rate = parseInt(removeCommas(rate));
        let amount = calculateAmount(qty, rate);
        $(this).parent().siblings('.amount').text(addCommas(amount.toString()));
        calculateAndSetTotalAmount();
    });

    listenKeyup('.packages-price', function () {
        let rate = $(this).val();
        rate = parseInt(removeCommas(rate));
        let qty = parseInt($(this).parent().siblings().find('.packages-qty').val());
        let amount = calculateAmount(qty, rate);
        $(this).parent().siblings('.amount').text(addCommas(amount.toString()));
        calculateAndSetTotalAmount();
    });

    listenKeyup( '.package-discount', function () {
        calculateAndSetTotalAmount();
    });

    const calculateAmount = (qty, rate) => {
        if (qty > 0 && rate > 0) {
            return qty * rate;
        } else {
            return 0;
        }
    };

    const calculateAndSetTotalAmount = () => {
        let totalAmount = 0;
        let discount = parseFloat(
            $('.package-discount').val() !== '' ? $('.package-discount').val() : 0);
        $('.package-service-item-container>tr').each(function () {
            let itemTotal = $(this).find('.item-total').text();
            itemTotal = removeCommas(itemTotal);
            itemTotal = isEmpty($.trim(itemTotal)) ? 0 : parseInt(itemTotal)
            totalAmount += itemTotal
        });
        totalAmount = parseFloat(totalAmount)
        totalAmount -= (totalAmount * discount / 100)
        $('#packagesTotal').text(addCommas(totalAmount.toFixed(2)))

        //set hidden input value
        $('#packagesTotalAmount').val(totalAmount)
    };
}

listenSubmit('.packageForm', function (event) {
    event.preventDefault()
    screenLock()
    $('#packagesSaveBtn').attr('disabled', true)
    let loadingButton = jQuery(this).find('#packagesSaveBtn')
    loadingButton.button('loading')
    let formData = new FormData($(this)[0])
    $.ajax({
        url: $('.packageSaveUrl').val(),
        type: 'POST',
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (result) {
            displaySuccessMessage(result.message)
            window.location.href = $('.packageUrl').val()
        },
        error: function (result) {
            printErrorMessage('#validationErrorsBox', result)
            $('#packagesSaveBtn').attr('disabled', false)
        },
        complete: function () {
            screenUnLock()
            loadingButton.button('reset')
        },
    })
})

listenClick('#packagesAddItem', function () {
    let data = {
        'services': JSON.parse($('.associateServices').val()),
        'uniqueId': uniquePackageId,
    }
    let packageServiceItemHtml = prepareTemplateRender(
        '#packageServiceTemplate', data)
    $('.package-service-item-container').append(packageServiceItemHtml)
    dropdownToPackageSelecte2('.serviceId')
    uniquePackageId++

    resetServicePackageItemIndex()
})

const resetServicePackageItemIndex = () => {
    let index = 1
    $('.package-service-item-container>tr').each(function () {
        $(this).find('.item-number').text(index)
        index++
    })
    if (index - 1 == 0) {
        let data = {
            'services': JSON.parse($('.associateServices').val()),
            'uniqueId': uniquePackageId,
        }
        let packageServiceItemHtml = prepareTemplateRender(
            '#packageServiceTemplate', data)
        $('.package-service-item-container').append(packageServiceItemHtml)
        dropdownToPackageSelecte2('.serviceId')
        uniquePackageId++
    }
}
