<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string"],
            "price" => ["required", "numeric", "min:0", "max:10000"],
            "seasons.*" => ["required"],
            "description" => ["required", "string", "max:120"],
            "image" => ["nullable", "file", "mimes:jpeg,png"],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "品名を入力してください",
            "price.required" => "値段を入力してください",
            "price.numeric" => "数値で入力してください",
            "price.min" => "0~10000円以内で入力してください",
            "price.max" => "0~10000円以内で入力してください",
            "seasons.*.required" => "季節を選択してください",
            "description.required" => "商品説明を入力してください",
            "description.max" => "120文字以内で入力してください",
            "image.required" => "商品画像を登録してください",
            "image.mimes" => "「.png」または「.jpeg」形式でアップロードしてください",
        ];
    }

}
