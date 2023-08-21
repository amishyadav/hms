<?php

namespace Database\Seeders;

use App\Models\CurrencySetting;
use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultCurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $input = [
            [
                'currency_name' => 'United states dollar',
                'currency_icon' => '$',
                'currency_code' => 'USD',
            ],
            [
                'currency_name' => 'Indian rupee',
                'currency_icon' => '₹',
                'currency_code' => 'INR',
            ],
            [
                'currency_name' => 'Euro',
                'currency_icon' => '€',
                'currency_code' => 'EUR',
            ],
            [
                'currency_name' => 'Australian Dollar',
                'currency_icon' => 'AU$',
                'currency_code' => 'AUD',
            ],
            [
                'currency_name' => 'Japanese Yen',
                'currency_icon' => '¥',
                'currency_code' => 'JPY',
            ],
            [
                'currency_name' => 'British Pound Sterling',
                'currency_icon' => '£',
                'currency_code' => 'GBP',
            ],
            [
                'currency_name' => 'Canadian Dollar',
                'currency_icon' => 'C$',
                'currency_code' => 'CAD',
            ],
            [
                'currency_name' => 'Kenyan Shilling',
                'currency_icon' => 'Ksh',
                'currency_code' => 'KES',
            ],
            [
                'currency_name' => 'Swiss Franc',
                'currency_icon' => 'CHF',
                'currency_code' => 'CHF',
            ],
        ];

        $hospitalTenants = User::where('department_id', '=',
            User::USER_ADMIN)->whereNotNull('hospital_name')->whereNotNull('username')->get();

        foreach ($hospitalTenants as $hospital) {
            foreach ($input as $data) {
                $data['tenant_id'] = $hospital->tenant_id;
                CurrencySetting::create($data);
            }
        }
    }

}
