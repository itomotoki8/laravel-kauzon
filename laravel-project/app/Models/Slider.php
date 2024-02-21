<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id','img_url'
    ];
    
    public function item() {
        return $this->hasOne(Item::class);
    }
}
