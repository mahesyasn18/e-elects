<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ["nama_tags"];

    public function transaction()
    {
        return $this->hasOne(Transactions::class);
    }
}
