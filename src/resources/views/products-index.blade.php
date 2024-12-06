    @extends('layouts.default')

    @section('title', '商品一覧')

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/products-index.css') }}">
    @endpush

    @section('content')
    <div class="top">
      <h2>商品一覧</h2>
      <a href="{{route("products.create")}}"><button class="top__add-product-button">+ 商品を追加</button></a>
    </div>

        <section class="layout-container">
            <aside class="search-and-sort">
                <form action="{{route("products.search")}}" method="GET">
                <div class="search-box">
                    <label for="search"  class="sort-box__label--hidden">商品名で検索</label>
                    <input class="search-box__input" type="text" id="search" name="name" placeholder="商品名で検索" >
                    <button type="submit" class="search-and-sort__button">検索</button>
                </div>
            </form>
                <div class="sort-box">
                    <label for="sort" class="sort-box__label">価格順で表示</label>
                    <select id="sort" class="sort-box__select">
                      <option value="" selected  disabled>価格で並べ替え</option>
                        <option value="asc">安い順に表示</option>
                        <option value="desc">高い順に表示</option>
                    </select>
                </div>

            </aside>

            <section class="product-list">
                @foreach($products as $product)
                <a href="{{ route("products.edit", ["productId" => $product->id]) }}" >
                 <div class="product">
                   <img src="{{asset("storage/photos/".$product->image )}}" alt="{{$product->name}}" class="product__img">
                   <div class="product__description">
                    <p>{{$product->name}}</p>
                    <p>{{$product->price}}</p>
                   </div>
                 </div>
                </a>
                @endforeach
                 </div>
            </section>
        </section>

        {{-- <div class="pagination">
            <button>&laquo;</button>
            <button class="active">1</button>
            <button>2</button>
            <button>3</button>
            <button>&raquo;</button>
        </div> --}}

        <div class="pagination">
            {{ $products->links() }}
        </div>

    @endsection
