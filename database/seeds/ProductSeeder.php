<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert($this->generateProducts(DatabaseSeeder::TOTAL_PRODUCTS));
    }

    private function generateProducts($count)
    {
        $products = [
            [
                'name' => 'Majoo Pro',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
                'price' => 2750000,
                'img' => '/products/standard_repo.png',
                'f_account' => 1,
                'f_category' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'Majoo Advance',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a.',
                'price' => 2750000,
                'img' => '/products/paket-advance.png',
                'f_account' => 1,
                'f_category' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Majoo Lifestyle',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
                'price' => 2750000,
                'img' => '/products/paket-lifestyle.png',
                'f_account' => 1,
                'f_category' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'Majoo Desktop',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
                'price' => 2750000,
                'img' => '/products/paket-desktop.png',
                'f_account' => 1,
                'f_category' => 1,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'name' => 'Nasi goreng',
                'description' => 'Nasi goreng dengan bumbu khas dan ditambah telur',
                'price' => 20000,
                'img' => '',
                'f_account' => 1,
                'f_category' => rand(1, DatabaseSeeder::TOTAL_CATEGORY),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ayam geprek',
                'description' => 'Ayam krispi kaya rasa di setiap gigitan dengan sambal bawang pedas',
                'price' => 22000,
                'img' => '',
                'f_account' => 1,
                'f_category' => rand(1, DatabaseSeeder::TOTAL_CATEGORY),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        for ($i = 0; $i < $count; $i++) {
            $accountId = rand(1, DatabaseSeeder::TOTAL_ACCOUNT);
            $name = 'Product ' . $i;
            $product = [
                'name' => $name,
                'description' => 'Product khas dari toko kami',
                'price' => $this->randomizePrice(10, 50, 1000),
                'img' => '/products/' . $accountId . '_' . $name . 'jpg',
                'f_account' => $accountId,
                'f_category' => rand(1, DatabaseSeeder::TOTAL_CATEGORY),
                'created_at'=>now(),
                'updated_at'=>now()
            ];
            $products[] = $product;
        }

        // $productModels = Product::NewMapListToModel($products);
        return $products;
    }

    public function randomizePrice($min = 10, $max = 100, $multiplier)
    {
        $randomNo = rand($min, $max);
        $price = $randomNo * $multiplier;
        return $price;
    }
}
