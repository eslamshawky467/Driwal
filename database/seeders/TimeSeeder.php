<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Time;
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
        DB::table('times')->delete();
        $times=[
            [
                'time'=>"01:00 AM",
            ],
            [
                'time'=>'02:00 AM',
            ],
            [
                'time'=>'03:00 AM',
            ],
            [
                'time'=>'04:00 AM',
            ],
            [
                'time'=>'05:00 AM',
            ],
            [
                'time'=>'06:00 AM',
            ],
            [
                'time'=>'07:00 AM',
            ],
            [
                'time'=>'08:00 AM',
            ],
            [
                'time'=>'09:00 AM',
            ],
            [
                'time'=>'10:00 AM',
            ],
            [
                'time'=>'11:00 AM',
            ],
            [
                'time'=>'12:00 AM',
            ],
            [
                'time'=>'01:00 PM',
            ],
            [
                'time'=>'02:00 PM',
            ],
            [
                'time'=>'03:00 PM',
            ],
            [
                'time'=>'04:00 PM',
            ],
            [
                'time'=>'05:00 PM',
            ],
            [
                'time'=>'06:00 PM',
            ],
            [
                'time'=>'07:00 PM',
            ],
            [
                'time'=>'08:00 PM',
            ],
            [
                'time'=>'09:00 PM',
            ],
            [
                'time'=>'10:00 PM',
            ],
            [
                'time'=>'11:00 PM',
            ],
            [
                'time'=>'12:00 PM',
            ],
            ];
            foreach ($times as $key => $value){
                Time::create($value);
                }
    }
}
