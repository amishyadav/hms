<?php

namespace Database\Seeders;

use App\Models\SuperAdminCurrencySetting;
use Illuminate\Database\Seeder;

class SuperAdminDefaultCurrencySeeder extends Seeder
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

        foreach ($input as $data) {

            SuperAdminCurrencySetting::create($data);
        }

    }
}
