<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 登録するレコードの準備
        $contents = [
            [ 'nickname' => 'なっち' ],
            [ 'nickname' => 'りこ' ],
            [ 'nickname' => 'なな' ],
        ];

        // 登録処理
        foreach ($contents as $content) {
            Content::create($content);
        }

    }
}
