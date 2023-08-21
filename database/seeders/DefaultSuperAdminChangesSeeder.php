<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DefaultSuperAdminChangesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkAdmins = User::where('owner_id', '=', null)->where('owner_type', '=', null)->where('department_id',
            1)->get();
        if ($checkAdmins) {
            foreach ($checkAdmins as $admin) {
                $admin->update(['is_admin_default' => 1]);
            }
        }

        $checkSuperAdmin = User::where('tenant_id', '=', null)->where('department_id', 10)->first();
        if ($checkSuperAdmin) {
            $checkSuperAdmin->update([
                'is_super_admin_default' => 1,
                'is_admin_default'       => 0,
            ]);
        }
    }
}
