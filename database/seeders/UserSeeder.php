<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    */
   public function run(): void
   {
      User::truncate();

      User::create([
         'full_name' => 'admin',
         'user_name' => 'admin',
         'role_name' => 'admin',
         'telegram_name' => 'admin',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => 'admin@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);

      User::create([
         'full_name' => 'cp ',
         'user_name' => 'cp',
         'role_name' => 'cp',
         'telegram_name' => 'cp ',
         'telegram_id' => '1122',
         'image' => 'avatar.png',
         'email' => 'cp@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);
      User::create([
         'full_name' => 'sg',
         'user_name' => 'sg',
         'role_name' => 'sg',
         'telegram_name' => 'sg',
         'telegram_id' => '12345',
         'image' => 'avatar.png',
         'email' => 'sg@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);


      User::create([
         'full_name' => 'xcp',
         'user_name' => 'xcp',
         'role_name' => 'xcp',
         'telegram_name' => 'xcp',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => 'xcp@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);

      User::create([
         'full_name' => 'sakhacup member',
         'user_name' => 'sakha_cup_member',
         'role_name' => 'sakha_cup_member',
         'telegram_name' => 'sakha cup member',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => 'cup@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);

      User::create([
         'full_name' => 'secretariate 1',
         'user_name' => 'secretariate1',
         'role_name' => 'secretariate',
         'telegram_name' => 'secretariate',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => '',
         'password' => Hash::make('@#1234546'),

      ]);

      User::create([
         'full_name' => 'secretariate 2',
         'user_name' => 'secretariate2',
         'role_name' => 'secretariate',
         'telegram_name' => 'secretariate',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => '',
         'password' => Hash::make('@#1234546'),

      ]);

      User::create([
         'full_name' => 'external',
         'user_name' => 'external',
         'role_name' => 'external',
         'telegram_name' => 'external',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => 'external@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);

      User::create([
         'full_name' => 'user',
         'user_name' => 'user',
         'role_name' => 'user',
         'telegram_name' => 'user',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => 'user@gmail.com',
         'password' => Hash::make('@#1234546'),
      ]);

      User::create([
         'full_name' => 'branch 1',
         'user_name' => 'branch1',
         'role_name' => 'branch',
         'telegram_name' => 'branch',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => '',
         'password' => Hash::make('@#1234546'),
      ]);

      User::create([
         'full_name' => 'branch 2',
         'user_name' => 'branch2',
         'role_name' => 'branch',
         'telegram_name' => 'branch',
         'telegram_id' => '1234',
         'image' => 'avatar.png',
         'email' => '',
         'password' => Hash::make('@#1234546'),
      ]);
   }
}
