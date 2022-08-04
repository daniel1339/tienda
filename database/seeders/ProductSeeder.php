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
                'observations' => '',
                'size' => 'S',
                'brand_id'=> 1,//marca nike
                'qty'=> 5,
                'shipping_date'=> '20/08/2022'
            ],
            [
                'name' => 'Camiseta',
                'observations' => '',
                'size' => 'M',
                'brand_id'=> 1,//marca nike
                'qty'=> 10,
                'shipping_date'=> '25/08/2022'
            ],

            [
                'name' => 'Buso',
                'observations' => '',
                'size' => 'M',
                'brand_id'=> 2,//marca adidas
                'qty'=> 6,
                'shipping_date'=> '23/08/2022'
            ],

            [
                'name' => 'Sudadera',
                'observations' => '',
                'size' => 'L',
                'brand_id'=> 2, //marca adidas
                'qty'=> 5,
                'shipping_date'=> '25/08/2022'
            ],
           
           
        ];

        foreach ($products as $product) {
            $product = Product::create($product);

        }
    }
}
