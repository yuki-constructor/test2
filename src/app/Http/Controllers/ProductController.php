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
        $products = Product::paginate(6);
        // $products = Product::all();

        return view("products-index", ["products" => $products]);
    }


    // 商品登録画面表示
    public function create()
    {
        $seasons = Season::all();
        return view("products-create", ["seasons" => $seasons]);
    }


    // 商品登録処理
    public function store(ProductRequest $request)
    {
        $savedfilepath = basename($request->file("image")->store("photos", "public"));
        $product = new Product($request->validated());
        $product["image"] = $savedfilepath;
        $product->save();
        // $product->seasons()->sync($product->seasons);
        $product->seasons()->sync($request->input('seasons', []));

        // $product=$request->velidated();
        // $product["image"]=basename($request->file("image")->store("photo","public"));
        // Product::create($product);

        return to_route("products.index");
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
            // 変更前の画像をstrage>app>public>photo ディレクトリから削除
            Storage::disk("public")->delete($product->image);
            // 変更後の画像をstrage>app>public>photo ディレクトリに保存、ファイルパスを $updateData["image"]にセット
            $updateData["image"] = basename($request->file("image")->store("photos", "public"));
            // $updateData["image"] = $request->file("image")->store("photos", "public");
        }

        // productsテーブルのデータを更新
        $product->update($updateData);
        // 中間テーブル（product_season テーブル）のデータを更新
        $product->seasons()->sync($updateData["seasons"]);
        // $product->seasons()->attach($updateData["seasons"]);

        return to_route("products.index");
    }




    // 検索
    public function search(Request $request)
    {

        // $products = Product::paginate(6);
        $products = Product::query();

        $keyword = $request->input("name");

        if (!empty($keyword)) {
            $products->where("name", "LIKE", "%{$keyword}%");
        }

        $products = $products->paginate(6);

        return view("products-index", ["products" => $products]);
    }



    // 削除
    public function destroy($productId)
    {

        $product = Product::findorfail($productId);
        // 中間テーブルのデータ削除
        // $product->seasons()->delete();
        $product->seasons()->detach();
        // productsテーブルのデータ削除
        $product->delete();
        // strage>app>public>photo ディレクトリから画像削除
        Storage::disk("public")->delete("photos/" . $product->image);

        return to_route("products.index");
    }
}
