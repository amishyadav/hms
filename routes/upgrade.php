<?php


// upgrade to v1.2.0
Route::get('/upgrade-to-v1-2-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_02_22_072906_add_theme_mode_to_users_table.php',
        ]);
});

// upgrade to v2.0.0
Route::get('/upgrade-to-v2-0-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_03_26_051413_change_transaction_id_in_transactions.php',
        ],
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_03_28_092201_add_is_manual_payment_in_transactions.php',
        ]);
});

// upgrade to v2.0.1
Route::get('/upgrade-to-v2-0-1', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_04_09_063627_change_doctor_foreign_in_operation_reports_table.php',
        ]);
});

// upgrade to v2.1.0
Route::get('/upgrade-to-v2-1-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_103141_change_length_email_in_password_resets.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_103141_change_length_email_in_password_resets.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_103950_change_length_name_in_accounts.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_104835_change_length_name_in_medicines.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105027_change_length_name_in_packages.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105131_change_length_title_in_bed_types.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105228_change_length_name_in_services.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105423_change_length_first_name_in_users.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105529_change_length_name_in_document_types.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105616_change_length_name_in_insurances.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_105820_change_length_vehicle_number_in_ambulances.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110013_change_length_title_in_doctor_departments.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110054_change_length_name_in_categories.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110121_change_length_name_in_brands.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110159_change_length_test_name_in_pathology_tests.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110234_change_length_name_in_pathology_categories.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110310_change_length_test_name_in_radiology_tests.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110359_change_length_name_in_radiology_categories.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110441_change_length_code_in_charges.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110518_change_length_name_in_charge_categories.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_110625_change_length_name_in_diagnosis_categories.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_111216_change_length_status_transaction_id_in_transactions.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_12_111540_change_length_name_in_features.php',
        ]);
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_05_16_111533_add_default_length_in_table.php',
        ]);
});


//upgrade to v.3.2.0
Route::get('/upgrade-to-v3-2-0', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_07_27_115635_add_sms_limit_to_subscription_plans_table.php',
        ]);

    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_07_28_070949_add_sms_limit_to_subscriptions_table.php',
        ]);
});


//upgrade to v.3.2.1
Route::get('/upgrade-to-v3-2-1', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_08_01_163441_create_add_prescription_fields_table.php',
        ]);

    Artisan::call('migrate',
        [
            '--force' => true,
            '--path'  => 'database/migrations/2022_08_02_164201_create_prescriptions_medicines_table.php',
        ]);
});

// upgrade all database

Route::get('/upgrade/database', function () {
    Artisan::call('migrate',
        [
            '--force' => true,
        ]);
});
