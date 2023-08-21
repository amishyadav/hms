<?php

namespace Database\Seeders;

use App\Models\SuperAdminSetting;
use Illuminate\Database\Seeder;

class SuperAdminFooterSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            [
                'key'   => 'footer_text',
                'value' => 'Over past 10+ years of experience and skills in various technologies, we built great scalable products. Whatever technology we worked with, we just not build products for our clients but we a',
            ],
            [
                'key'   => 'address',
                'value' => '423B, Road Wordwide Country, USA',
            ],
            [
                'key'   => 'email',
                'value' => 'admin@hms.com',
            ],
            [
                'key'   => 'phone',
                'value' => '+91 2345678900',
            ],
            [
                'key'   => 'facebook_url',
                'value' => 'https://www.facebook.com/test/',
            ],
            [
                'key'   => 'twitter_url',
                'value' => 'https://twitter.com/test?lang=en',
            ],
            [
                'key'   => 'instagram_url',
                'value' => 'https://www.instagram.com/?hl=en',
            ],
            [
                'key'   => 'linkedin_url',
                'value' => 'https://www.linkedin.com/test',
            ],
        ];

        foreach ($inputs as $input) {
            SuperAdminSetting::create($input);
        }
    }
}
