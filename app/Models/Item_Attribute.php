<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Attribute extends Model
{
    use HasFactory;
    protected $table = "item_attribute";

    public $timestamps = false;
    
    protected $fillable = [
        "item_api_id",
        "name",
        "value",
    ];

    protected $guarded = ['id'];
}
