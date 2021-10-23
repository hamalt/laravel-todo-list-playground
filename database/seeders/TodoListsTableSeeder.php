<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルのクリア
        DB::table('todo_lists')->truncate();

        // 初期データ用意
        $todo_lists = [
            [
                'title' => 'バナナ買う',
                'description' => 'ヨーカドーのお買い得コーナーで。',
                'complete' => false
            ],
            [
                'title' => '事前調査する',
                'description' => 'BOTの競合調査',
                'complete' => false
            ]
        ];

        foreach($todo_lists as $todo_list) {
            \App\Models\TodoList::create($todo_list);
        }
    }
}
