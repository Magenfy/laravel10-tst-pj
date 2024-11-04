<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'id'           => '1',
            'name'         => 'DANVOUY Womens T Shirt Casual Cotton Short2',
            'price'        =>  12,
            'category'     => 'womens clothing',
            'description'  => '95%Cotton,5%Spandex, Features: Casual, Short Sleeve, Letter Print,V-Neck,Fashion Tees, The fabric is soft and has some stretch., Occasion: Casual/Office/Beach/School/Home/Street. Season: Spring,Summer,Autumn,Winter.',
            'image_url'    => 'https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg',
        ]);
    }
}
