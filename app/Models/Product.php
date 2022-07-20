<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["admin_id", "name", "stok", "harga", "file", "unique_code", "color", "berat"];

    public function category()
    {
        return $this->belongsToMany(Category::class, "category_product");
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function detail()
    {
        return $this->hasOne(ProductsDetail::class);
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }
    public function detailtransaction()
    {
        return $this->belongsToMany(Transactions::class, "transaction_detail")->withPivot('qty');
    }
}
