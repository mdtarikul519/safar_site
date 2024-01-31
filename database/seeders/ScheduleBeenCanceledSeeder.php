<?php

namespace Database\Seeders;

use App\Models\ScheduleBeenCanceld;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleBeenCanceledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduleBeenCanceld::truncate();

        ScheduleBeenCanceld::create([
            'schedule_id' => '1',
            'secretariate_id' => '3',
            'sakha_id' => '1',
            'cancel_comment' => 'i am very busy',

        ]);

        ScheduleBeenCanceld::create([
            'schedule_id' => '2',
            'secretariate_id' => '4',
            'sakha_id' => '2',
            'cancel_comment' => 'i am very busy',

        ]);
    }
}
