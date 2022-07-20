<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $guarded = ["id"];

    public function cities()
    {
        return $this->belongsTo(Cities::class, "id_cities");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class, "id_provinces");
    }
}
