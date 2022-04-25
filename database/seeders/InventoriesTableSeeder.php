<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
            [
                'product_id' => 1,
                'total_quantity' => 10,
                'available_quantity' => 0,
                'total_quantity_ordered' => 10,
            ],
            [
                'product_id' => 2,
                'total_quantity' => 10,
                'available_quantity' => 10,
                'total_quantity_ordered' => 0,
            ],
            [
                'product_id' => 3,
                'total_quantity' => 10,
                'available_quantity' => 10,
                'total_quantity_ordered' => 0,
            ],
            [
                'product_id' => 4,
                'total_quantity' => 10,
                'available_quantity' => 10,
                'total_quantity_ordered' => 0,
            ]     
        ]);
    }
}
