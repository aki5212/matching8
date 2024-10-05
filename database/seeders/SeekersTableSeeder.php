<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seeker;
use App\Models\Content;

class SeekersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // ファクトリで生成されるタイトルを上書きする
            Content::factory()->create(['nickname' => 'programming']),
            Content::factory()->create(['nickname' => 'design']),
            Content::factory()->create(['nickname' => 'management']),
        ];

        foreach ($contents as $content) {
            // カテゴリ1件につき、2件の求職を登録する
            // ファクトリで生成されるカテゴリIDを上書きする
            Seeker::factory(2)
                ->create(['content_id' => $content->id]);
        }
    }
}
