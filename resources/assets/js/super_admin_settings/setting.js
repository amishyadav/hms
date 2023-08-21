document.addEventListener('turbo:load', loadSuperAdminSettingDate)

function loadSuperAdminSettingDate() {

    if (typeof $('#footerSettingPhoneNumber').val() != 'undefined' &&
        $('#footerSettingPhoneNumber').val() !== '')
        $('.phoneNumber').trigger('blur')
    if ($('#defaultCountryCode').length) {
        let input = document.querySelector('#defaultCountryData')
        let intl = window.intlTelInput(input, {
            initialCountry: defaultCountryCodeValue,
            separateDialCode: true,
            geoIpLookup: function (success, failure) {
                $.get('https://ipinfo.io', function () {
                }, 'jsonp').always(function (resp) {
                    var countryCode = (resp && resp.country)
                        ? resp.country
                        : ''
                    success(countryCode)
                })
            },
            utilsScript: '../../public/assets/js/inttel/js/utils.min.js',
        })
        let getCode = intl.selectedCountryData['name'] + '+' +
            intl.selectedCountryData['dialCode']
        $('#defaultCountryData').val(getCode)
        // $('.iti__flag').attr('class').split(' ')[1]

    }

    if (!$('#footerSettingPhoneNumber').length) {
        return
    }

}

listenChange('#appLogo', function () {
    $('#validationErrorsBox').addClass('d-none');
    if (isValidLogo($(this), '#validationErrorsBox')) {
        displayLogo(this, '#previewImage');
    }
})

listenSubmit('#createSetting', function (event) {
    event.preventDefault();
    $('#createSetting')[0].submit();

    return true;
})

window.isValidLogo = function (inputSelector, validationMessageSelector) {
    let ext = $(inputSelector).val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['jpg', 'png', 'jpeg']) == -1) {
        $(inputSelector).val('');
        $(validationMessageSelector).removeClass('d-none');
        $(validationMessageSelector).
            html('The image must be a file of type: jpg, jpeg, png.').
            show();
        return false;
    }
    $(validationMessageSelector).hide();
    return true;
};

window.displayLogo = function (input, selector) {
    let displayPreview = true;
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            let image = new Image();
            image.src = e.target.result;
            image.onload = function () {
                /*
                if (image.height != 60 && image.width != 90) {
                    $(selector).val('');
                    $('#validationErrorsBox').removeClass('d-none');
                    $('#validationErrorsBox').
                        html($('#imageValidation').val()).
                        show();
                    return false;
                }
                 */
                $(selector).attr('src', e.target.result)
                displayPreview = true
            };
        };
        if (displayPreview) {
            reader.readAsDataURL(input.files[0])
            $(selector).show()
        }
    }
};
listenClick('.iti__standard', function () {
    $('#defaultCountryData').val($(this).text())
    $(this).attr('data-country-code')
    $('#defaultCountryCode').val($(this).attr('data-country-code'))
})

listenClick('#resetFilter', function () {
    $('#filter_status').val('2').trigger('change');
    hideDropdownManually('.dropdown-menu,#dropdownMenuButton1')
})

listenSubmit('#superAdminFooterSettingForm', function (event) {
    event.preventDefault();

    if ($('.error-msg').text() !== '') {
        $('.phoneNumber').focus();
        return false;
    }

    let facebookUrl = $('#facebookUrl').val();
    let twitterUrl = $('#twitterUrl').val();
    let instagramUrl = $('#instagramUrl').val();
    let linkedInUrl = $('#linkedInUrl').val();

    let facebookExp = new RegExp(
        /^(https?:\/\/)?((m{1}\.)?)?((w{2,3}\.)?)facebook.[a-z]{2,3}\/?.*/i);
    let twitterExp = new RegExp(
        /^(https?:\/\/)?((m{1}\.)?)?((w{2,3}\.)?)twitter\.[a-z]{2,3}\/?.*/i);
    let instagramUrlExp = new RegExp(
        /^(https?:\/\/)?((w{2,3}\.)?)instagram.[a-z]{2,3}\/?.*/i);
    let linkedInExp = new RegExp(
        /^(https?:\/\/)?((w{2,3}\.)?)linkedin\.[a-z]{2,3}\/?.*/i);

    let facebookCheck = (facebookUrl == '' ? true : (facebookUrl.match(
        facebookExp) ? true : false));
    if (!facebookCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_facebook_url'));
        return false;
    }
    let twitterCheck = (twitterUrl == '' ? true : (twitterUrl.match(twitterExp)
        ? true
        : false));
    if (!twitterCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_twitter_url'));
        return false;
    }
    let instagramCheck = (instagramUrl == '' ? true : (instagramUrl.match(
        instagramUrlExp) ? true : false));
    if (!instagramCheck) {
        displayErrorMessage(Lang.get('messages.common.please_enter_valid_Instagram_url'));
        return false;
    }
    let linkedInCheck = (linkedInUrl == '' ? true : (linkedInUrl.match(
        linkedInExp) ? true : false));
    if (!linkedInCheck) {
        displayErrorMessage(
            Lang.get('messages.common.please_enter_valid_Instagram_url'))
        return false
    }
    $('#superAdminFooterSettingForm')[0].submit()

    return true
})

listenClick('.iti__standard,.iti__preferred', function () {
    $('#defaultCountryData').val($(this).text())
    $('#defaultCountryCode').val($(this).attr('data-country-code'))
})
