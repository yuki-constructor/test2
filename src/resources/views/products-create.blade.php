@extends('layouts.default')

@section('title', '商品登録')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/products-create.css') }}">
@endpush

@section('content')
<section class="form-container">
    <h2>商品登録</h2>
    <form action="{{route("products.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="product-name">商品名 <span class="form-required">必須</span></label>
            <input class="form__input" type="text" id="product-name" name="name" placeholder="商品名を入力" required>
        </div>
        <div class="form-group">
            <label for="price">値段 <span class="form-required">必須</span></label>
            <input class="form__input" type="text" id="product-price" name="price" nanaplaceholder="値段を入力" required>
        </div>
        <div class="form-group">
            <label for="product-image">商品画像 <span class="form-required">必須</span></label>
            <input type="file" id="product-image" name="image" required>
        </div>
        <div class="form-group">
            <label>季節 <span class="form-required">必須</span> <span class="form-optional">複数選択可</span></label>
            <div class="checkbox-group">
                @foreach($seasons as $season)
                <label><input type="checkbox" name="seasons[]" value="{{$season->id}}" required>{{$season->name}}</label>
                @endforeach
                {{-- <label><input type="checkbox" name="seasons[]" value="spring" required> 春</label>
                <label><input type="checkbox" name="seasons[]" value="summer"> 夏</label>
                <label><input type="checkbox" name="seasons[]" value="autumn"> 秋</label>
                <label><input type="checkbox" name="seasons[]" value="winter"> 冬</label> --}}
            </div>
        </div>
        <div class="form-group">
            <label for="description">商品説明 <span class="form-required">必須</span></label>
            <textarea class="form__input" id="product-description" name="description" placeholder="商品の説明を入力" required></textarea>
        </div>
        <div class="form__button">
            <a href="{{route("products.index")}}"><button type="button" class="form__cancel-button">戻る</button></a>
            <button type="submit" class="form__submit-button">登録</button>
        </div>
    </form>
</section>
@endsection
