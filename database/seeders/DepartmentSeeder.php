<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('departments')->insert([
            ['department_name' => 'IT', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Nhân sự', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Kế toán', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Kho', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Hành chính', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}