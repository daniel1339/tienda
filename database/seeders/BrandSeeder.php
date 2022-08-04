<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
         

            [
                'name' => 'nike',
               
            ],

            [
                'name' => 'adidas',
                
            ],
           
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);

        }
    }
}
