@extends('layouts.default')

@section('title', '商品編集')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/products-edit.css') }}">
@endpush

@section('content')
    <form action="{{route("products.update",["productId" => $product->id])}}" method="POST" enctype="multipart/form-data" class="grid-layout">
        @csrf
    <div class="breadcrumb">
        <a href="{{route("products.index")}}">商品一覧</a> &gt; <span>{{ $product->name }}</span>
    </div>

          <!-- 左側: 商品画像とファイル選択 -->
            <div class="product-image">

                    <img src="{{asset("storage/photos/".$product->image )}}" alt="{{$product->name}}" class="product__img">
                <label for="product-image" class="product-image__label">ファイルを選択
                <input type="file" class="product-image__input" id="product-image" name="image"></label>
                 {{-- エラーメッセージ --}}
                 @if($errors->has("image"))
                 <div class="error-message">
                 <ul>
                     @foreach ($errors->get("image") as $error)
                         <li>{{$error}}</li>
                     @endforeach
                 </ul>
                 </div>
                 @endif

            </div>

            <!-- 右側: 商品名、値段、季節 -->
            <div class="product-info">

                    <div class="form-group">
                        <label class="product-info__label" for="product-name">商品名</label>
                        <input class="product-info__input" type="text" id="product-name" name="name" value="{{$product->name}}">
                        {{-- エラーメッセージ --}}
                        @if($errors->has("name"))
                        <div class="error-message">
                        <ul>
                            @foreach ($errors->get("name") as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="product-info__label" for="product-price">値段</label>
                        <input class="product-info__input" type="text" id="product-price" name="price" value="{{$product->price}}">
                         {{-- エラーメッセージ --}}
                         @if($errors->has("price"))
                         <div class="error-message">
                         <ul>
                             @foreach ($errors->get("price") as $error)
                                 <li>{{$error}}</li>
                             @endforeach
                         </ul>
                         </div>
                         @endif
                    </div>

                    <div class="form-group">
                        <label class="product-info__label" >季節</label>
                        <div class="checkbox-group">
                            @foreach($seasons as $season)
                            {{-- <label><input type="checkbox" name="seasons[]" value="{{$season->name}}">{{$season->name}}</label> --}}
                            <label><input type="checkbox" name="seasons[]" value="{{$season->id}}" @if (in_array($season->id,old("seasons",$product->seasons->pluck("id")->all()))) checked @endif>{{$season->name}}</label>
                            @endforeach
                             {{-- エラーメッセージ --}}
                        @if($errors->has("seasons"))
                        <div class="error-message">
                        <ul>
                            @foreach ($errors->get("seasons") as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        </div>
                        @endif
                        </div>
                    </div>

            </div>


        <!-- 下側:商品説明 -->
        <div class="product-description">
                <div class="form-group">
                    <label  class="product-description__label" for="product-description">商品説明</label>
                    <textarea class="product-description__input" id="product-description" name="description" >{{$product->description}}</textarea>
                     {{-- エラーメッセージ --}}
                     @if($errors->has("description"))
                     <div class="error-message">
                     <ul>
                         @foreach ($errors->get("description") as $error)
                             <li>{{$error}}</li>
                         @endforeach
                     </ul>
                     </div>
                     @endif
                </div>

                <div class="form__button">
                <div class="form__button--center">
                    <a href="{{route("products.index")}}"><button type="button" class="form__cancel-button">戻る</button></a>
                    <button type="submit" class="form__submit-button">変更を保存</button>
                  </div>
                  <div class="form__button--right">
                    <button type="button" class="form__delete-button" title="削除">&#128465;</button>
                </div>
              </div>

        </div>
    </form>

@endsection
