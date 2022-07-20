<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $guarded = ["id"];
    protected $fillable = ["user_id", "nama", "no_hp", "alamat", "total", "ongkir", "kecamatan", "cities_id", "tag_id", "ispaid", "expiry_date", "invoice"];
    public function products()
    {
        return $this->belongsToMany(Product::class, "transaction_detail")->withPivot('qty');
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function cities()
    {
        return $this->belongsTo(Cities::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class, "transaction_id");
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
