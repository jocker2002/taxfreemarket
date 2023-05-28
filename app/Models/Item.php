<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "item";
    protected $fillable = [
        "item_api_id",
        "availability",
        "bestTaxable",
        "brand",
        "catalogRuleId",
        "code",
        "createdAt",
        "currency",
        "intangible",
        "intra",
        "lastUpdate",
        "madein",
        "name",
        "noVariation",
        "online",
        "taxable",
        "type",
        "weight",
        "item_id",
        "sellPrice",
        "ruleId",
        "created_at",
        "updated_at"
    ];

    protected $guarded = ['id'];

    
    public function pictures() {
        return $this->hasMany(Item_Picture::class, 'item_api_id' ,'item_api_id');
    }

    public function attribute() {
        return $this->hasMany(Item_Attribute::class, 'item_api_id' ,'item_api_id');
    }


    public function description() {
        return $this->hasMany(Item_Description::class, 'item_api_id' ,'item_api_id');
    }

    public function model() {
        return $this->hasMany(Item_Model::class, 'item_api_id' ,'item_api_id');
    }

    public function tag() {
        return $this->hasMany(Item_Tag::class, 'item_api_id' ,'item_api_id');
    }

    public function tag_translation() {
        return $this->hasMany(Item_Tag_Translation::class, 'item_api_id' ,'item_api_id');
    }

    public function tag_value_translation() {
        return $this->hasMany(Item_Tag_Value_Translation::class, 'item_api_id' ,'item_api_id');
    }
    
}