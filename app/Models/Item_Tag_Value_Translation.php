<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Tag_Value_Translation extends Model
{
    use HasFactory;
    protected $table = "item_tag_value_translation";

    public $timestamps = false;

    protected $fillable = [
        "item_api_id",
        "tag_id",
        "localecode",
        "value"
    ];

    protected $guarded = ['id'];
}
