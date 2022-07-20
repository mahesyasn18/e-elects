<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsDetail extends Model
{
    use HasFactory;
    protected $table = "products_details";
    protected $fillable = ["product_id", "announced", "OS", "display", "chipset", "camera", "sensors", "battery"];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}
