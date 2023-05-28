<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Picture extends Model
{
    use HasFactory;
    protected $table = "item_picture";

    public $timestamps = false;
    
    protected $fillable = [
        "item_api_id",
        "url",
        "blob",
        "picture_id"
    ];

    protected $guarded = ['id'];
}
