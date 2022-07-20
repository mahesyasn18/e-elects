<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ["transaction_id", "rekening", "account_name", "bank", "total", "payment_date"];
    public function transaction()
    {
        return $this->belongsTo(Transactions::class, "transaction_id");
    }
}
