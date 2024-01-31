<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\SecretariateActiveStatus;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::truncate();

         $data = Schedule::create([
            'shakha_id' => 10,
            'sakha' => 'branch 1',
            'present_time' => '2024-02-01 10:00:00',
            'leave_time' => '2024-02-01 12:00:00',
            'time_of_present_in_own_address' =>'2024-02-01 16:30:00',
            'program_start_time' => '2024-02-12 10:30:00',
            'program_end_time' => '2024-02-12 11:45:00',
            'how_many_programs' => '2',
            'program_ids' => 5,
            'program_type' => 'ofline',
            'deligate_amount' => '1500',
            'deligate_type' => 'kormi',
            'topics' => 'month in program',
            'secretariate_id' => 6,
            'schedule_status' => 'completed',
            'secretariate_comment' => 'this is a very good program',

        ]);

        SecretariateActiveStatus::create([
            'schedule_id' => $data->id,
            'post_date' =>  Carbon::parse($data->present_time)->toDateTimeString(),
            'active_status' => 'busy',
            'busy_start' => $data->present_time,
            'busy_end' =>  $data->time_of_present_in_own_address,
            'when_free' => $data->time_of_present_in_own_address,
            'description' =>'angaest in program',
        ]);

        


       $data = Schedule::create([
            'shakha_id' => 10,
            'sakha' => 'branch 1',
            'present_time' => '2024-02-04 10:00:00',
            'leave_time' => '2024-02-04 12:00:00',
            'time_of_present_in_own_address' => '2024-02-22 17:30:00',
            'program_start_time' => '2024-02-04  10:30:00',
            'program_end_time' => '2024-02-04  11:30:00',
            'how_many_programs' => '2',
            'program_ids' => 5,
            'program_type' => 'ofline',
            'deligate_amount' => '1500',
            'deligate_type' => 'kormi',
            'topics' => 'month in program',
            'secretariate_id' => 7,
            'schedule_status' => 'completed',
            'secretariate_comment' => 'this is a very good program',

        ]);

        SecretariateActiveStatus::create([
            'schedule_id' => $data->id,
            'post_date' =>  Carbon::parse($data->present_time)->toDateTimeString(),
            'active_status' => 'busy',
            'busy_start' => $data->present_time,
            'busy_end' =>  $data->time_of_present_in_own_address,
            'when_free' => $data->time_of_present_in_own_address,
            'description' =>'angaest in program',
        ]);




       $data = Schedule::create([
            'shakha_id' => 11,
            'sakha' => 'branch 2',
            'present_time' => '2024-02-07 10:00:00',
            'leave_time' => '2024-02-07 12:00:00',
            'time_of_present_in_own_address' => '2024-02-07 13:30:00',
            'program_start_time' => '2024-02-07  10:30:00',
            'program_end_time' => '2024-02-07  11:50:00',
            'how_many_programs' => '2',
            'program_ids' => 5,
            'program_type' => 'ofline',
            'deligate_amount' => '1500',
            'deligate_type' => 'kormi',
            'topics' => 'month in program',
            'secretariate_id' => 6,
            'schedule_status' => 'completed',
            'secretariate_comment' => 'this is a very good program',

        ]);

       
        SecretariateActiveStatus::create([
            'schedule_id' => $data->id,
            'post_date' =>  Carbon::parse($data->present_time)->toDateTimeString(),
            'active_status' => 'busy',
            'busy_start' => $data->present_time,
            'busy_end' =>  $data->time_of_present_in_own_address,
            'when_free' => $data->time_of_present_in_own_address,
            'description' =>'angaest in program',
        ]);



        $data = Schedule::create([
            'shakha_id' => 11,
            'sakha' => 'branch 2',
            'present_time' => '2024-02-09 10:00:00',
            'leave_time' => '2024-02-09 12:00:00',
            'time_of_present_in_own_address' => '2024-02-09 13:30:00',
            'program_start_time' => '2024-02-09  10:30:00',
            'program_end_time' => '2024-02-09  11:30:00',
            'how_many_programs' => '2',
            'program_ids' => 5,
            'program_type' => 'ofline',
            'deligate_amount' => '1500',
            'deligate_type' => 'kormi',
            'topics' => 'month in program',
            'secretariate_id' => 7,
            'schedule_status' => 'completed',
            'secretariate_comment' => 'this is a very good program',

        ]);


      
        SecretariateActiveStatus::create([
            'schedule_id' => $data->id,
            'post_date' =>  Carbon::parse($data->present_time)->toDateTimeString(),
            'active_status' => 'busy',
            'busy_start' => $data->present_time,
            'busy_end' =>  $data->time_of_present_in_own_address,
            'when_free' => $data->time_of_present_in_own_address,
            'description' =>'angaest in program',
        ]);

    }
}
