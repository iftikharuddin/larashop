<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
			'imagePath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
			'title' => 'Harry Pooter',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error eum inventore officia quis quos totam! Asperiores deleniti, distinctio illum incidunt nulla officiis quas suscipit vitae? Magni necessitatibus repellendus voluptate!',
			'price' => 2220
		]);
		$product->save();
		
		$product = new \App\Product([
			'imagePath' => 'http://lorempixel.com/400/200/cats',
			'title' => 'Joker',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error eum inventore officia quis quos totam! Asperiores deleniti, distinctio illum incidunt nulla officiis quas suscipit vitae? Magni necessitatibus repellendus voluptate!',
			'price' => 310
		]);
		$product->save();
		
		$product = new \App\Product([
			'imagePath' => 'http://lorempixel.com/400/200/sports',
			'title' => 'Batman',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error eum inventore officia quis quos totam! Asperiores deleniti, distinctio illum incidunt nulla officiis quas suscipit vitae? Magni necessitatibus repellendus voluptate!',
			'price' => 220
		]);
		$product->save();
		
		$product = new \App\Product([
			'imagePath' => 'http://lorempixel.com/400/200/sports/1/Dummy-Text/',
			'title' => 'Torab kaak',
			'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error eum inventore officia quis quos totam! Asperiores deleniti, distinctio illum incidunt nulla officiis quas suscipit vitae? Magni necessitatibus repellendus voluptate!',
			'price' => 110
		]);
		$product->save();
    }
}
