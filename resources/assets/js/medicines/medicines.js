listenClick('.deleteMedicineBtn', function (event) {
    let id = $(event.currentTarget).attr('data-id')
    deleteItem($('#indexMedicineUrl').val() + '/' + id, '#tblMedicines',
        $('#medicineLang').val())
})

listenClick('.showMedicineBtn', function (event) {
    event.preventDefault()
    let medicineId = $(event.currentTarget).attr('data-id')
    renderMedicineData(medicineId)
})

function renderMedicineData (id) {
    $.ajax({
        url: $('#medicinesShowModal').val() + '/' + id,
        type: 'GET',
        success: function (result) {
            if (result.success) {
                $('#showMedicineName').text(result.data.name)
                $('#showMedicineBrand').text(result.data.brand.name)
                $('#showMedicineCategory').text(result.data.category.name)
                $('#showMedicineSaltComposition').
                    text(result.data.salt_composition)
                $('#showMedicineSellingPrice').
                    text($('.currentCurrency').val() + ' ' +
                        addCommas(result.data.selling_price))
                $('#showMedicineBuyingPrice').
                    text($('.currentCurrency').val() + ' ' +
                        addCommas(result.data.buying_price))
                $('#showMedicineSideEffects').text(result.data.side_effects)
                $('#showMedicineCreatedOn').
                    text(moment(result.data.created_at).fromNow())
                $('#showMedicineUpdatedOn').
                    text(moment(result.data.updated_at).fromNow())
                $('#showMedicineDescription').text(result.data.description)

                setValueOfEmptySpan()
                $('#showMedicine').appendTo('body').modal('show')
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
}

