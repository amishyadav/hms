document.addEventListener('turbo:load', loadPlanFeatureData)

function loadPlanFeatureData() {
    window.featureChecked = function (featureLength) {
        let totalFeature = $('.feature:checkbox').length;
        if (featureLength === totalFeature) {
            $('#selectAllPlanFeatures').prop('checked', true);
        } else {
            $('#selectAllPlanFeatures').prop('checked', false);
        }
    };

    // features selection script - starts
    let featureLength = $('.feature:checkbox:checked').length;
    featureChecked(featureLength);
    
    listenClick('#selectAllPlanFeatures', function () {
        if ($('#selectAllPlanFeatures').is(':checked')) {
            $('.feature').each(function () {
                $(this).prop('checked', true);
            });
        } else {
            $('.feature').each(function () {
                $(this).prop('checked', false);
            });
        }
    })
    
    listenClick('.feature', function () {
        let featureLength = $('.feature:checkbox:checked').length;
        featureChecked(featureLength);
    })
}
