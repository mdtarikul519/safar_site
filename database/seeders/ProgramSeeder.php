<?php

namespace Database\Seeders;

use App\Models\Programe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Programe::truncate();

       Programe::create([
         'title' =>'shathi monthly program',
       ]);

       Programe::create([
        'title' =>'kormi monthly program',
      ]);
    }
}
