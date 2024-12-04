    @extends('layouts.default')

    @section('title', '商品一覧')

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    @endpush

    @section('content')
    <div class="top">
      <h2>商品一覧</h2>
      <button class="top__add-product-button">+ 商品を追加</button>
    </div>

        <section class="layout-container">
            <aside class="search-and-sort">
                <div class="search-box">
                    <label for="search"  class="sort-box__label">商品名で検索</label>
                    <input class="search-box__input" type="text" id="search" placeholder="商品名で検索" >
                    <button class="search-and-sort__button">検索</button>
                </div>
                <div class="sort-box">
                    <label for="sort">価格順で表示</label>
                    <select id="sort" class="sort-box__select">
                      <option value="" selected hidden >価格で並べ替え</option>
                        <option value="asc">安い順に表示</option>
                        <option value="desc">高い順に表示</option>
                    </select>
                </div>
            </aside>

            <section class="product-list">
                @foreach($products as $product)
                 <div class="product">
                   <img src="{{asset("storage/photos/".$product->image )}}" alt="{{$product->name}}" class="product__img">
                   <div class="product__description">
                    <p>{{$product->name}}</p>
                    <p>{{$product->price}}</p>
                   </div>
                 </div>
                @endforeach
                 </div>
            </section>
        </section>

        <div class="pagination">
            <button>&laquo;</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>&raquo;</button>
        </div>
    @endsection