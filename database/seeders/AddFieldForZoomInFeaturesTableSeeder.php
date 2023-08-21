<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AddFieldForZoomInFeaturesTableSeeder extends Seeder
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
                'name'      => 'Live Consultations',
                'submenu'   => 2,
                'route'     => [
                    'route_name' => [
                        'live.consultation.index',
                        'live.consultation.create',
                        'live.consultation.store',
                        'live.consultation.edit',
                        'live.consultation.show',
                        'live.consultation.update',
                        'live.consultation.destroy',
                        'live.consultation.list',
                        'live.consultation.change.status',
                        'live.consultation.get.live.status',
                        'zoom.credential',
                        'zoom.credential.create'
                    ],
                ],
                'sub_menus' => [
                    [
                        'name'  => 'Live Meetings',
                        'route' => [
                            'route_name' => [
                                'live.meeting.index',
                                'live.meeting.store',
                                'live.meeting.change.status',
                                'live.meeting.get.live.status',
                                'live.meeting.show',
                                'live.meeting.edit',
                                'live.meeting.update',
                                'live.meeting.destroy',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($input as $data) {
            /** @var Feature $feature */
            $feature = Feature::where('name', $data['name'])->first();
            if ($feature) {
                $feature->update(Arr::only($data, ['name', 'submenu', 'route']));
                if (isset($data['sub_menus'])) {
                    foreach ($data['sub_menus'] as $subMenu) {
                        $subMenuFeature = Feature::where('name', $subMenu['name'])->first();
                        if ($subMenuFeature) {
                            $subMenu['has_parent'] = $feature->id;
                            $subMenuFeature->update($subMenu);
                        } else {
                            $subMenu['has_parent'] = $feature->id;
                            Feature::create($subMenu);
                        }
                    }
                }
            } else {
                $feature = Feature::create(Arr::only($data, ['name', 'submenu', 'route', 'is_default']));
                if (isset($data['sub_menus'])) {
                    foreach ($data['sub_menus'] as $subMenu) {
                        $subMenu['has_parent'] = $feature->id;
                        Feature::create($subMenu);
                    }
                }
            }
        }
    }
}
