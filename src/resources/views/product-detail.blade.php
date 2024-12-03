@extends('layouts.default')

@section('title', '商品編集')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product-detail.css') }}">
@endpush

@section('content')
<div class="grid-layout">
    <div class="breadcrumb">
        <a href="#">商品一覧</a> &gt; <span>キウイ</span>
    </div>

          <!-- 左側: 商品画像とファイル選択 -->
            <div class="product-image">
                <img src="img/kiwi.png" alt="">
                <label for="file-upload" class="product-image__label">ファイルを選択</label>
                <input type="file" id="file-upload">
            </div>

            <!-- 右側: 商品名、値段、季節 -->
            <div class="product-info">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label class="product-info__label" for="product-name">商品名</label>
                        <input class="product-info__input" type="text" id="product-name" name="product-name" placeholder="キウイ">
                    </div>

                    <div class="form-group">
                        <label class="product-info__label" for="product-price">値段</label>
                        <input class="product-info__input" type="text" id="product-price" name="product-price" placeholder="800">
                    </div>

                    <div class="form-group">
                        <label class="product-info__label" >季節</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="season" value="spring" checked> 春</label>
                            <label><input type="checkbox" name="season" value="summer"> 夏</label>
                            <label><input type="checkbox" name="season" value="autumn"> 秋</label>
                            <label><input type="checkbox" name="season" value="winter"> 冬</label>
                        </div>
                    </div>
                </form>
            </div>


        <!-- 下側:商品説明 -->
        <div class="product-description">
            <form action="#" method="POST">
                <div class="form-group">
                    <label  class="product-description__label" for="product-description">商品説明</label>
                    <textarea class="product-description__input" id="product-description" name="product-description" placeholder="爽やかな香りと上品な甘みが特徴的なキウイは大人から子どもまで人気のフルーツです。疲れた脳や体のエネルギー補給にも最適の商品です。もぎたてフルーツのスムージーをお召し上がりください！"></textarea>
                </div>
                <div class="form__button">
                <div class="form__button--center">
                    <button type="button" class="form__cancel-button">戻る</button>
                    <button type="submit" class="form__submit-button">変更を保存</button>
                  </div>
                  <div class="form__button--right">
                    <button type="button" class="form__delete-button" title="削除">&#128465;</button>
                </div>
              </div>
            </form>
        </div>
      </div>
@endsection
