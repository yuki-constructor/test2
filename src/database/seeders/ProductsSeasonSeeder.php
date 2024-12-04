<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Season;

class ProductsSeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // SeasonsデータをSeasonsテーブルに挿入
        $seasonData = ['春', '夏', '秋', '冬'];
        $seasons = [];

        foreach ($seasonData as $seasonName) {
            $seasons[$seasonName] = Season::create([
                'name' => $seasonName
            ]);
        }

        //Productsデータ
        $products = [
            [
                'name' => 'キウイ',
                'price' => 800,
                'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。',
                'image' => 'kiwi.png',
                'seasons' => ['秋', '冬'],
            ],
            [
                'name' => 'ストロベリー',
                'price' => 1200,
                'description' => '大人気のストロベリーです。',
                'image' => 'strawberry.png',
                'seasons' => ['春'],
            ],
            [
                'name' => 'オレンジ',
                'price' => 850,
                'description' => 'オレンジは酸味と甘みのバランスが抜群です。',
                'image' => 'orange.png',
                'seasons' => ['冬'],
            ],
            [
                'name' => 'スイカ',
                'price' => 700,
                'description' => '夏の定番、甘くてジューシーなスイカ。',
                'image' => 'watermelon.png',
                'seasons' => ['夏'],
            ],
            [
                'name' => 'ピーチ',
                'price' => 1000,
                'description' => '甘くて柔らかい桃が特徴です。',
                'image' => 'peach.png',
                'seasons' => ['夏'],
            ],
            [
                'name' => 'シャインマスカット',
                'price' => 1400,
                'description' => '高級なシャインマスカットです。',
                'image' => 'muscat.png',
                'seasons' => ['夏', '秋'],
            ],
            [
                'name' => 'パイナップル',
                'price' => 800,
                'description' => '甘酸っぱいパイナップルです。',
                'image' => 'pineapple.png',
                'seasons' => ['春', '夏'],
            ],
            [
                'name' => 'ブドウ',
                'price' => 1100,
                'description' => '高品質なブドウを使用しています。',
                'image' => 'grapes.png',
                'seasons' => ['秋'],
            ],
            [
                'name' => 'バナナ',
                'price' => 600,
                'description' => '栄養豊富で低カロリーなバナナです。',
                'image' => 'banana.png',
                'seasons' => ['春', '夏', '秋', '冬'],
            ],
            [
                'name' => 'メロン',
                'price' => 900,
                'description' => '甘くて芳醇な香りが特徴のメロンです。',
                'image' => 'melon.png',
                'seasons' => ['夏'],
            ],
        ];

             // ProductsデータをProductsテーブルに挿入
        foreach ($products as $productData) {
                $product = Product::create([
                'name' => $productData['name'],
                'price' => $productData['price'],
                'description' => $productData['description'],
                'image' => $productData['image'],
            ]);

            // リレーションを設定
            $seasonIds = array_map(fn($seasonName) => $seasons[$seasonName]->id, $productData['seasons']);
            $product->seasons()->attach($seasonIds);
        }
    }
}
