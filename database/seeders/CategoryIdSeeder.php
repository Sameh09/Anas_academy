<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = DB::table('products')->get();
        foreach ($records as $record) {
            DB::table('products')->where('id', $record->id)->update([
                'category_id' => rand(1, 5),  // categoryid range
            ]);
        }
    }
}
