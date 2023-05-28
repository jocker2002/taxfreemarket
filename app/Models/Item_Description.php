<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Description extends Model
{
    use HasFactory;
    protected $table = "item_description";

    public $timestamps = false;
    
    protected $fillable = [
        "item_api_id",
        "description",
        "localecode"
    ];

    protected $guarded = ['id'];
}
