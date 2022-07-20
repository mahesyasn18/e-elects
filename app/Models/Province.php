<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'province'];

    public function detailuser()
    {
        return $this->hasMany(Addresses::class);
    }
}
