<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{




    // 商品一覧画面表示
    public function index()
    {
        $products=Product::all();
        
        return view("products-index", ["products"=>$products]);

    }

    // 商品詳細画面表示
    public function edit()
    {
        return view("products-edit");
    }

    // 商品更新処理
    public function update() {}


    // 商品登録画面表示
    public function create()
    {
        return view("products-create");
    }



    // 商品登録処理
    public function store() {}


    // 検索
    public function search() {}



    // 削除
    public function destroy() {}
}
