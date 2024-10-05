<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seeker;
use App\Models\Employer;

class EmployerSeekerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seekers = Seeker::all();
        $employer = Employer::all();

        foreach ($seekers as $seeker) {
            $employerIds = $employer
                ->random(2)     // 2件求人をランダムに抽出
                ->pluck('id')   // 求人モデルからIDのみを抽出する
                ->all();  

            // 求職にランダムに抜き出した2件の求人のID配列を関連づける
            $seeker->$employer()->attach($employerIds);
        }
    }
}
