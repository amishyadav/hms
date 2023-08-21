document.addEventListener('turbo:load', loadEditAdminEmployeePayroll)

function loadEditAdminEmployeePayroll() {
    setTimeout(function () {
        $('#editEmployeePayrollType').trigger('change');
    }, 1000);
}
