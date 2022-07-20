<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    protected $table = "transaction_detail";
    protected $fillable = ["transaction_id", "product_id", "qty", "price"];
    public $timestamps = false;
}
