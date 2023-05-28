<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api_Info extends Model
{
    use HasFactory;
    protected $table = "api_info";

    protected $fillable = [
        "url",
        "totalNumberOfElements",
        "imgBase"
    ];

    protected $guarded = ['id'];
}
