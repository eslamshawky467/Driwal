<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimesCost;
use Illuminate\Support\Facades\DB;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('times_costs')->delete();
        $times=[
            [
                'from'=>'06:00:00',
                'to'=>'12:00:00',
                'cost'=>10.0
            ],
            [
                'from'=>'12:01:00',
                'to' => '18:00:00',
                'cost'=>9.0
            ],
            [
                'from'=>'18:01:00',
                'to'=> '00:00:00',
                'cost'=>20.0
            ],
            [
                'from'=>'00:00:01',
                'to'=>'05:59:00',
                'cost'=>5.0
            ],
                    ];
            foreach ($times as $key => $value){
                TimesCost::create($value);
                }
    }
}
