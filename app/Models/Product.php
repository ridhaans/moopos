<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public  static function NewMapListToModel($arr)
    {
        $products = [];
        foreach ($arr as $v) {
            $product = new Product();
            $product->name = $v["name"];
            $product->description = $v["description"];
            $product->price = $v["price"];
            $product->img = $v["img"];
            $product->f_account = $v["f_account"];
            $product->f_category = $v["f_category"];
            $products[] = $product;
        }
        return $products;
    }
}
