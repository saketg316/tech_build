<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Monitor',
                'image' => 'storage/monitor.jpeg',
                'title' => 'Monitor 2.0',
                'description' => 'This is a monitor. Buy it now.',
                'unit_price' => 15000,
            ],
            [
                'name' => 'Mouse',
                'image' => 'storage/mouse.jpeg',
                'title' => 'Mouse 2.0',
                'description' => 'This is a Mouse. Buy it now.',
                'unit_price' => 1200,
            ],
            [
                'name' => 'Keyboard',
                'image' => 'storage/keyboard.jpeg',
                'title' => 'Keyboard 2.0',
                'description' => 'This is a keyboard. Buy it now.',
                'unit_price' => 1700,
            ],
            [
                'name' => 'Laptop',
                'image' => 'storage/laptop.jpeg',
                'title' => 'Keyboard 2.0',
                'description' => 'This is a laptop. Buy it now.',
                'unit_price' => 70000,
            ]     
        ]);
    }
}
