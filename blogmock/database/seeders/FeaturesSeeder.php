<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Internal' => [
                'SQ', 'Air Con', 'Laundry Room', 'Balcony', 'Fireplace'
            ],
            'External' => [
                'Parking', 'Garden', 'Pool', 'CCTV'
            ]
        ];

        foreach($data as $type => $features){
            foreach($features as $feature){
                Feature::create([
                    'type' => $type,
                    'name' => $feature
                ]);
            }
        }

    }
}
