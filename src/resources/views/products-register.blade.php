@extends('layouts.default')

@section('title', '商品登録')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/productsーregister.css') }}">
@endpush

@section('content')
<section class="form-container">
    <h2>商品登録</h2>
    <form>
        <div class="form-group">
            <label for="product-name">商品名 <span class="form-required">必須</span></label>
            <input class="form__input" type="text" id="product-name" placeholder="商品名を入力" required>
        </div>
        <div class="form-group">
            <label for="price">値段 <span class="form-required">必須</span></label>
            <input class="form__input" type="text" id="price" placeholder="値段を入力" required>
        </div>
        <div class="form-group">
            <label for="product-image">商品画像 <span class="form-required">必須</span></label>
            <input type="file" id="product-image" required>
        </div>
        <div class="form-group">
            <label>季節 <span class="form-required">必須</span> <span class="form-optional">複数選択可</span></label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="season" value="spring" required> 春</label>
                <label><input type="checkbox" name="season" value="summer"> 夏</label>
                <label><input type="checkbox" name="season" value="autumn"> 秋</label>
                <label><input type="checkbox" name="season" value="winter"> 冬</label>
            </div>
        </div>
        <div class="form-group">
            <label for="description">商品説明 <span class="form-required">必須</span></label>
            <textarea class="form__input" id="description" placeholder="商品の説明を入力" required></textarea>
        </div>
        <div class="form__button">
            <button type="button" class="form__cancel-button">戻る</button>
            <button type="submit" class="form__submit-button">登録</button>
        </div>
    </form>
</section>
@endsection
