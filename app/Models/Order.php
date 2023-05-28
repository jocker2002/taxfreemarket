<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "order";
    protected $fillable = [
        "status",
        "user_id",
        "price_final",
        "created_at",
        "updated_at"
    ];

    protected $guarded = ['id'];

    public function orders() {
        return $this->hasMany(User::class, 'id' ,'user_id');
    }
}
