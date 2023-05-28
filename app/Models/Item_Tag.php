<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Tag extends Model
{
    use HasFactory;
    protected $table = "item_tag";

    public $timestamps = false;

    protected $fillable = [
        "item_api_id",
        "hidden",
        "priority",
        "name",
        "value",
        "tag_id"
    ];

    protected $guarded = ['id'];
}
