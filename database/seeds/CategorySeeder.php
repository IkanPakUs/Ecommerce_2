<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::truncate();
        Category::insert([
            ["category_id" => 1, "category_name" => "Shirt"],
            ["category_id" => 2, "category_name" => "T-Shirt"],
            ["category_id" => 3, "category_name" => "Shoes"],
            ["category_id" => 4, "category_name" => "Syal"],
            ["category_id" => 5, "category_name" => "Bag"],
            ["category_id" => 6, "category_name" => "Sweater"],
            ["category_id" => 7, "category_name" => "Jacket"],
        ]);
    }
}
