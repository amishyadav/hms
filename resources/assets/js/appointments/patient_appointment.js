document.addEventListener('turbo:load', loadPatientAppointmentData)

function loadPatientAppointmentData() {
    $('#status').select2();
}

listenClick('.appointment-delete-btn', function (event) {
    let appointmentId = $(event.currentTarget).attr('data-id');
    deleteItem($('#appointmentIndexURL').val() + '/' + appointmentId,
        '#appointmentsTbl',
        $('#appointmentLang').val())
})

listenClick('#resetAppointmentFilter', function () {
    timeRange.data('daterangepicker').
        setStartDate(moment().startOf('week').format('MM/DD/YYYY'));
    timeRange.data('daterangepicker').
        setEndDate(moment().endOf('week').format('MM/DD/YYYY'));
    startTime = timeRange.data('daterangepicker').
        startDate.
        format('YYYY-MM-D  H:mm:ss');
    endTime = timeRange.data('daterangepicker').
        endDate.
        format('YYYY-MM-D  H:mm:ss');
    $('#status').val(2).trigger('change');
    hideDropdownManually('.dropdown-menu,#dropdownMenuButton1')
})

let timeRange = $('#time_range');
var start = moment().subtract(29, 'days');
var end = moment();
let startTime = '';
let endTime = '';

function cb (start, end) {
    $('#time_range').
        html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
}

timeRange.daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [
            moment().subtract(1, 'days'),
            moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [
            moment().subtract(1, 'month').startOf('month'),
            moment().subtract(1, 'month').endOf('month')],
    },
}, cb);

cb(start, end);
timeRange.on('apply.daterangepicker', function (ev, picker) {
    startTime = picker.startDate.format('YYYY-MM-D  H:mm:ss');
    endTime = picker.endDate.format('YYYY-MM-D  H:mm:ss');
    window.livewire.emit('refresh')
    // $('#appointmentsTbl').DataTable().ajax.reload(null, true);
});
