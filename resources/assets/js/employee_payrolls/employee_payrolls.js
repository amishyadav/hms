document.addEventListener('turbo:load', loadAdminEmployeePayrollData)

function loadAdminEmployeePayrollData() {
    listenClick('#employeePayrollResetFilter', function () {
        $('#employee_payroll_filter_status').val(0).trigger('change');
        hideDropdownManually($('#employeePayroll'), $('.dropdown-menu'))
    })
}

listenChange('#employee_payroll_filter_status', function (){
    window.livewire.emit('changeFilter', 'statusFilter', $(this).val())
})

listenClick('.employee-payroll-delete-btn', function (event) {
    let employeePayrollId = $(event.currentTarget).attr('data-id');
    deleteItem(
        $('#employeePayrollURL').val() + '/' + employeePayrollId,
        '#employeePayrollsTable',
        $('#employeePayrollLang').val(),
    );
})

listenClick('.employee-payroll-show-btn', function (event) {
    let employeePayrollId = $(event.currentTarget).attr('data-id');
    renderEmployeePayrollsData(employeePayrollId)
})

window.renderEmployeePayrollsData = function (id) {
    $.ajax({
        url: $('#employeePayrollShowModal').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#employee_payroll_sr_no').text(result.data.sr_no)
                $('#payroll_id').text(result.data.payroll_id)
                $('#payroll_role').text(result.data.type_string)
                if (result.data.type_string == 'Doctor')
                {
                    $('#employee_full_name').text(result.data.owner.doctor_user.full_name);
                }
                else
                {
                    $('#employee_full_name').text(result.data.owner.user.full_name);
                }
                // $('#employee_payroll_full_name').text(result.data.owner.user.full_name)
                $('#payroll_month').text(result.data.month)
                $('#payroll_year').text(result.data.year);
                $('#employee_payroll_salary').text(addCommas(result.data.basic_salary));
                $('#employee_payroll_allowance').text(addCommas(result.data.allowance));
                $('#employee_payroll_deductions').text(addCommas(result.data.deductions));
                $('#employee_payroll_net_salary').text(addCommas(result.data.net_salary));
                $('#employee_payroll_status').empty();
                if (result.data.status == 1) {
                    $('#employee_payroll_status').
                        append(
                            '<span class="badge bg-light-success">Paid</span>');
                } else {
                    $('#employee_payroll_status').
                        append(
                            '<span class="badge bg-light-danger">Unpaid</span>');
                }
                $('#employee_payroll_created_on').text(moment(result.data.created_at).fromNow());
                $('#employee_payroll_updated_on').text(moment(result.data.updated_at).fromNow());
                setValueOfEmptySpan();
                $('#showEmployeePayrolls').appendTo('body').modal('show');
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
};
