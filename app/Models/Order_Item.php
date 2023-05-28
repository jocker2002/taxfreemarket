<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
    use HasFactory;

    protected $table = "order_item";
    protected $fillable = [
        "order_id",
        "item_id",
        "item_model_id",
        "quantity",
        "created_at",
        "updated_at"
    ];

    protected $guarded = ['id'];

    public function orders() {
        return $this->hasMany(Order::class, 'id', 'order_id');
    }

    public function items() {
        return $this->hasMany(Item::class, 'id', 'item_id');
    }

    public function item_models() {
        return $this->hasMany(Item_Model::class, 'id', 'item_model_id');
    }
}
