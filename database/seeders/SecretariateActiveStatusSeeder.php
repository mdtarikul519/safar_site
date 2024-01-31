<?php

namespace Database\Seeders;
use App\Models\SecretariateActiveStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecretariateActiveStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SecretariateActiveStatus::truncate();

        SecretariateActiveStatus::create([
            'schedule_id' => 1,
            'post_date' => '2024-03-22 10:00:00',
            'active_status' => 'free',
            'busy_start' => '2024-03-22 09:00:00',
            'busy_end' => '2024-03-22 10:00:00',
            'when_free' => '2024-01-22 08:00:00',
            'description' =>'angaest in program',
        ]);

        SecretariateActiveStatus::create([
            'schedule_id' => 3,
            'post_date' => '2024-03-22 10:00:00',
            'active_status' => 'free',
            'busy_start' => '2024-03-22 09:00:00',
            'busy_end' => '2024-03-22 10:00:00',
            'when_free' => '2024-01-22 08:00:00',
            'description' =>'angaest in program',
        ]);

        SecretariateActiveStatus::create([
            'schedule_id' => 3,
            'post_date' => '2024-03-22 10:00:00',
            'active_status' => 'free',
            'busy_start' => '2024-03-22 09:00:00',
            'busy_end' => '2024-03-22 10:00:00',
            'when_free' => '2024-01-22 08:00:00',
            'description' =>'angaest in program',
        ]);

        SecretariateActiveStatus::create([
            'schedule_id' => 3,
            'post_date' => '2024-03-22 10:00:00',
            'active_status' => 'free',
            'busy_start' => '2024-03-22 09:00:00',
            'busy_end' => '2024-03-22 10:00:00',
            'when_free' => '2024-01-22 08:00:00',
            'description' =>'angaest in program',
        ]);
    }
}
