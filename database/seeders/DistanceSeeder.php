<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Distance;
use Illuminate\Support\Facades\DB;

class DistanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('distances')->delete();
        $distances=[
            [
                'distance'=>'0-100',
            ],
            [
                'distance'=>'100-300',
            ],
            [
                'distance'=>'300-500',
            ]
            ];
            foreach ($distances as $key => $value){
                Distance::create($value);
                }
    }
}
