<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'province_id', 'type', 'city_name'];

    public function detailusercity()
    {
        return $this->hasOne(Addresses::class);
    }
    public function transaction()
    {
        return $this->hasOne(Transactions::class);
    }
}
