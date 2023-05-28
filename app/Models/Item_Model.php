<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Model extends Model
{
    use HasFactory;
    protected $table = "item_model";

    public $timestamps = false;
    
    protected $fillable = [
        "item_api_id",
        "attributes",
        "descriptions",
        "availability",
        "bestTaxable",
        "streetPrice",
        "suggestedPrice",
        "taxable",
        "model",
        "backorder",
        "code",
        "size",
        "color",
        "barcode",
        "lastUpdate",
        "lastTimeZero",
        "model_id",
        "sellPrice",
        "ruleId"
    ];

    protected $guarded = ['id'];
}
