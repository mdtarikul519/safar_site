<?php

namespace Database\Seeders;

use App\Models\ScheduleVoucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleVoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ScheduleVoucher::truncate();

        ScheduleVoucher::create([
            'secretariate_id' => '5',
            'sakha_id' => '5',
            'schedule_id' => '5',
            'amount' => '1400',
            'amount_in_bangla' => '1200',
            'schedule_status'=>'pending',

        ]);
     
    }
}
