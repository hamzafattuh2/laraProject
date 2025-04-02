<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
   // حذف السجلات وإعادة ضبط AUTO_INCREMENT
    DB::table('admins')->truncate();
        Admin::create([

            'name' => 'hmaza',
            'email' => 'hamza@gmail.com',
            'password' => bcrypt(123456789),
            'rate' => 2.5,
        ]);
        Admin::create([
            'name' => 'mhd',
            'email' => 'mhd@gmail.com',
            'password' => bcrypt(123456789),
            'rate' => 2.0,
        ]);

    }
}
