<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('request_types')->insert([
            ['id' => 1, 'type_name' => 'Phiếu sửa chữa'],
            ['id' => 2, 'type_name' => 'Phiếu ra cổng'],
        ]);
    }
}