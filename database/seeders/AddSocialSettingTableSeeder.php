<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class AddSocialSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userTenantId = session('tenant_id', null);
        $favicon = ('web/img/hms-saas-favicon.ico');

        Setting::create(['key'       => 'favicon', 'value' => $favicon,
                         'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'facebook_url', 'value' => 'https://www.facebook.com/test',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'twitter_url', 'value' => 'https://twitter.com/test?lang=en',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create(['key'       => 'instagram_url', 'value' => 'https://www.instagram.com/?hl=en',
                         'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'linkedIn_url',
            'value'     => 'https://www.linkedin.com/test',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
        Setting::create([
            'key'       => 'about_us', 'value' => 'Over past 10+ years of experience and skills in various technologies, we built great scalable products.
Whatever technology we worked with, we just not build products for our clients but we also try to make it generate and available to other lots of developers worldwide. And that\'s the reason we are the only leading company in India who created tools and available it to millions of developers worldwide. Feel free to checkout our Github account. Because we believe that open-source is the future !! We have an open-source lab to which we call InfyOm Lab .',
            'tenant_id' => $userTenantId != null ? $userTenantId : null,
        ]);
    }
}
