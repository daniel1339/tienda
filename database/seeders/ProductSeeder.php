<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Camisa deportiva',
                'observations' => 'df',
                'size' => 'S',
                'brand_id'=> 1,//marca nike
                'qty'=> 5,
                'shipping_date'=> '2022-08-25'
            ],
            [
                'name' => 'Camiseta',
                'observations' => 'dfs',
                'size' => 'M',
                'brand_id'=> 1,//marca nike
                'qty'=> 10,
                'shipping_date'=> '2022-08-25'
            ],

            [
                'name' => 'Buso',
                'observations' => 'dfs',
                'size' => 'M',
                'brand_id'=> 2,//marca adidas
                'qty'=> 6,
                'shipping_date'=> '2022-08-25'
            ],

            [
                'name' => 'Sudadera',
                'observations' => 'dsf',
                'size' => 'L',
                'brand_id'=> 2, //marca adidas
                'qty'=> 5,
                'shipping_date'=> '2022-08-25'
            ],
           
           
        ];

        foreach ($products as $product) {
            $product = Product::create($product);

        }
    }
}
