<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'image_list',
        'price',
        'sale_price',
        'description',
        'status',
        'category_id',
    ];


    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function details()
    {
        return $this->hasMany(Order_detail::class, 'product_id', 'id');
    }
    //  them localScope de search
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }
}