document.addEventListener('turbo:load', loadAdminPayrollData)

function loadAdminPayrollData() {
    $('.employeePayrollType,.EmployeePayrollOwnerType,.EmployeePayrollMonth,.EmployeePayrollStatus').select2({
        width: '100%',
    });

    $('.price-input').trigger('input');

    $('#employeePayrollType').focus()
}

listenChange('.EmployeePayrollBasicSalary,.EmployeePayrollAllowance,.EmployeePayrollDeductions', function () {
    let basicSalary = parseFloat(removeCommas($('.EmployeePayrollBasicSalary').val()));
    let allowance = parseFloat(removeCommas($('.EmployeePayrollAllowance').val()));
    let deductions = parseFloat(removeCommas($('.EmployeePayrollDeductions').val()));
    let netSalary = ((basicSalary + allowance) - deductions);

    if (deductions > netSalary) {
        $('#validationErrorsBox').removeClass('d-none');
        $('#validationErrorsBox').
            text('Deductions cannot be greater than Basic salary + Allowance').
            show();
        $('.EmployeePayrollDeductions').val(null);
        deductions = 0;
        setTimeout(function () {
            $('#validationErrorsBox').addClass('d-none');
            $('#validationErrorsBox').text('');
        }, 7000);
    }
    (!isNaN(netSalary)) ? $('.employeePayrollNetSalary').val(netSalary).trigger('input') : $(
        '.employeePayrollNetSalary').val(0);
})

listenChange('.employeePayrollType', function () {
    if ($(this).val() !== '') {
        $.ajax({
            url: $('.employeeURL').val(),
            type: 'get',
            dataType: 'json',
            data: { id: $(this).val() },
            success: function (data) {
                if (data.data.length != 0) {
                    $('.EmployeePayrollOwnerType').empty();
                    $('.EmployeePayrollOwnerType').removeAttr('disabled');
                    $.each(data.data, function (i, v) {
                        $('.EmployeePayrollOwnerType').
                            append($('<option></option>').
                                attr('value', i).
                                text(v));
                    });
                } else {
                    $('.EmployeePayrollOwnerType').trigger('change');
                }
                if ($('.isEdit').val()) {
                    $('.EmployeePayrollOwnerType').val($('#employeeOwnerId').val()).trigger('change');
                    $('.isEdit').val(false);
                }
            },
        });
    }
    $('.EmployeePayrollOwnerType').empty();
    $('.EmployeePayrollOwnerType').prepend('<option value="0">Select Employee</option>');
    $('.EmployeePayrollOwnerType').prop('disabled', true);
})

listenSubmit('#createEmployeePayroll, #editEmployeePayroll', function () {
    $('.btnSave').attr('disabled', true);
})
