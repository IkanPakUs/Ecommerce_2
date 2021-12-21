<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::truncate();
        $products = [
            ["name" => "Mickey Baggy", "price" => 125000, "desc" => "tas bagus banget, isi foto mickey mouse lo..", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090892/ECommerce/mickey1_hjuc2u.jpg", "https://res.cloudinary.com/didlpymlt/image/upload/v1640090894/ECommerce/mickey2_jf9rap.jpg", "https://res.cloudinary.com/didlpymlt/image/upload/v1640090892/ECommerce/mickey4_cvkij8.jpg", "https://res.cloudinary.com/didlpymlt/image/upload/v1640090892/ECommerce/mickey3_ribvqt.jpg"], "category_id" => 5],
            ["name" => "Guangzho Sweater", "price" => 150000, "desc" => "Baju nama kecina cinaan", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090866/ECommerce/women-2_ngbujv.jpg"], "category_id" => 6],
            ["name" => "Pure Pineapple", "price" => 175000, "desc" => "Baju yang gk ada nanas nanasnya sama sekali", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090866/ECommerce/women-1_ro928y.jpg"], "category_id" => 6],
            ["name" => "Green Jacket", "price" => 75000, "desc" => "Jaket, warna hijau, banyak kantongnya, pake kancing", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090865/ECommerce/product-3_cwwn1c.jpg", "https://res.cloudinary.com/didlpymlt/image/upload/v1640090873/ECommerce/product-1_hiuqyz.jpg", "https://res.cloudinary.com/didlpymlt/image/upload/v1640090872/ECommerce/thumb-3_orhs0d.jpg"], "category_id" => 7],
            ["name" => "Jacket Jeans", "price" => 100000, "desc" => "Jaket, tapi jeans", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090863/ECommerce/man-4_yqtgi2.jpg"], "category_id" => 7],
            ["name" => "Hiking Ransel", "price" => 205000, "desc" => "Tas ransel gede muat banyak, keknya bagus pake hiking", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090863/ECommerce/man-1_kafros.jpg"], "category_id" => 5],
            ["name" => "Converse Yellow", "price" => 400000, "desc" => "Sepatu kuning, kek pisang", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090863/ECommerce/man-2_d8imrp.jpg"], "category_id" => 3],
            ["name" => "Brown Syal", "price" => 40000, "desc" => "Syal panjang cocok buat perang sarung", "media_url" => ["https://res.cloudinary.com/didlpymlt/image/upload/v1640090865/ECommerce/product-4_pvaf4x.jpg"], "category_id" => 4],
        ];

        foreach ($products as $product) {
            $_product = new Product();
                $_product->name = $product["name"];
                $_product->price = $product["price"];
                $_product->description = $product["desc"];
                $_product->category_id = $product["category_id"];
            $_product->save();

            foreach ($product["media_url"] as $media) {
                $_product->mediaUrl()->create(["media_url" => $media]);
            }
        }
    }
}
