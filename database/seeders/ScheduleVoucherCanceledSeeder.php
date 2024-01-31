<?php

namespace Database\Seeders;

use App\Models\ScheduleBeenCanceld;
use App\Models\ScheduleVoucherCanceled;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleVoucherCanceledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduleVoucherCanceled::truncate();

        ScheduleVoucherCanceled::create([
            'schedule_id' => '5',
            'secretariate_id' => '5',
            'sakha_id' => '5',
            'status' =>'canceled',
            'cancel_comment' =>'schedul has been cancled due to rain',

        ]);
        ScheduleVoucherCanceled::create([
            'schedule_id' => '5',
            'secretariate_id' => '5',
            'sakha_id' => '5',
            'status' =>'approve',
            'cancel_comment' =>'schedul has been complite',

        ]);
    }
}
