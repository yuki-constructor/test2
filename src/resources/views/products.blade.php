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
              <div class="product">
                 <img src="{{asset("storage/photos/kiwi.png" )}}" alt="キウイ" class="product__img">
                   <div class="product__description">
                    <p>キウイ</p>
                    <p>¥800</p>
                </div>
              </div>
                <div class="product">
                  <img src="{{asset("storage/photos/strawberry.png" )}}" alt="ストロベリー"  class="product__img">
                   <div class="product__description">
                      <p>ストロベリー</p>
                        <p>¥1200</p>
                     </div>
                 </div>
                 <div class="product">
                  <img src="{{asset("storage/photos/orange.png" )}}" alt="オレンジ"  class="product__img">
                   <div class="product__description">
                    <p>オレンジ</p>
                    <p>¥850</p>
                </div>
              </div>
                <div class="product">
                  <img src="{{asset("storage/photos/watermelon.png" )}}" alt="スイカ"  class="product__img">
                   <div class="product__description">
                    <p>スイカ</p>
                    <p>¥700</p>
                </div>
              </div>
                <div class="product">
                 <img src="{{asset("storage/photos/peach.png" )}}" alt="ピーチ"  class="product__img">
                   <div class="product__description">
                    <p>ピーチ</p>
                    <p>¥1000</p>
                </div>
              </div>
                <div class="product">
                 <img src="{{asset("storage/photos/muscat.png" )}}" alt="シャインマスカット"  class="product__img">
                  <div class="product__description">
                    <p>シャインマスカット</p>
                    <p>¥1400</p>
                </div>
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
