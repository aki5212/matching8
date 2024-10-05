<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmployerDetail;

class EmployersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ファクトリによって5件の著者詳細情報を作成
        // 合わせて著者情報も5件作成される
        EmployerDetail::factory(5)->create();
    }
}
