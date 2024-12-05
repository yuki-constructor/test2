<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{




    // 商品一覧画面表示
    public function index()
    {
        $products = Product::all();

        return view("products-index", ["products" => $products]);
    }

    // 商品詳細画面表示
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        $seasons = Season::all();

        return view('products-edit', ['product' => $product, "seasons" => $seasons]);
    }

    // 商品更新処理
    public function update(EditProductRequest $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $updateData = $request->validated();

        // 画像を変更する場合
        if ($request->has("image")) {
            // 変更前の画像を削除
            Storage::disk("public")->delete($product->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData["image"] = $request->file("image")->store("photos", "public");
        }
        $product->update($updateData);

        return to_route("products.index");
    }


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
